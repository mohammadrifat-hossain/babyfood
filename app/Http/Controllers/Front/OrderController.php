<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\User;
use App\Repositories\CartRepo;
use App\Repositories\OrderRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->middleware('auth');
    }

    public function checkout(){
        // Refresh
        CartRepo::refresh();

        $carts = CartRepo::summary();

        return view('front.checkout', compact('carts'));
    }

    public function order(Request $request){
        $v_data = [
            'name' => 'required|max:255',
            'mobile_number' => 'required|max:25',
            'address' => 'required|max:255',
            'note' => 'max:2555'
        ];

        $request->validate($v_data);

        // Refresh
        CartRepo::refresh();

        // Carts
        $cart_summary = CartRepo::summary($request->shipping_charge ?? 0);
        $carts = CartRepo::get();
        if(!count($carts)){
            return redirect()->route('cart')->with('error-alert', 'Your cart is empty!');
        }

        // Client
        if(auth()->user()){
            $client = auth()->user();
        }else{
            $client = User::where('mobile_number', $request->mobile_number)->first();
            if(!$client && $request->email){
                $client = User::where('email', $request->email)->first();
            }
            if(!$client){
                $client = new User;
                $client->last_name = $request->name;
                $client->mobile_number = $request->mobile_number;
                $client->email = $request->email;
                $client->street = $request->address;
                $client->password = Hash::make(123456789);
                $client->save();
            }
        }

        // $admin = User::where('type', 'order_employee')->first();
        // if(!$admin){
        // }
        $admin = User::where('type', 'order_employee')->orderBy('order_submitted_at')->first();

        $order = new Order();

        $order->admin_id = $admin->id ?? null;

        // Customer Information
        $order->user_id = $client->id;
        $order->last_name = $request->name;
        $order->street = $request->address;
        $order->mobile_number = $request->mobile_number;
        $order->email = $request->email;
        $order->note = $request->note;

        // Customer Shipping Information
        $order->shipping_full_name = $request->name;
        $order->shipping_email = $request->email;
        $order->shipping_mobile_number = $request->mobile_number;
        $order->shipping_street = $request->address;

        // Charges
        $order->product_total = $cart_summary['product_total'];
        $order->tax_amount = $cart_summary['tax_amount'] ?? 0;
        $order->discount = $cart_summary['only_discount'];
        $order->discount_amount = $cart_summary['discount'];

        // Shipping
        $order->shipping_charge = $request->shipping_charge;
        $order->shipping_method = 'Cash On delivery';
        $order->shipping_weight = 0;
        // $order->shipping_id = $request->shipping_service_id;

        // // Coupon
        // $coupon_code = Cookie::get('coupon');
        // if($coupon_code){
        //     $coupon = Coupon::where('code', $coupon_code)->first();

        //     $order->coupon_id = $coupon->id;
        //     $order->coupon_code = $coupon_code;

        //     Cookie::queue('coupon', null, 1);

        //     // Update coupon
        //     $coupon->total_use += 1;
        //     $coupon->save();
        // }

        $order->save();

        if($admin){
            $admin->order_submitted_at = Carbon::now();
            $admin->save();
        }

        // Insert Order Status
        OrderRepo::status($order->id, 'Order created', 'Customer');

        // Insert order products
        $order_items = array();
        foreach($carts as $key => $cart){
            $order_product = OrderRepo::product($order->id, $cart->product_id, $cart->product_data_id, $cart->ProductData->custom_sale_price, $cart->quantity);

            $order_items[$key]['title'] = $order_product->Product->title ?? 'n/a';
            $order_items[$key]['price'] = $order_product->sale_price;
            $order_items[$key]['quantity'] = $order_product->quantity;
            $order_items[$key]['image'] = $order_product->Product->img_paths['original'] ?? asset('img/default-img.png');
            $order_items[$key]['attributes'] = $cart->ProductData->attribute_items_string ?? null;
        }

        if(env('COMMON_ORDER')){
            $body_data['name'] = $order->shipping_full_name;
            $body_data['sales_partner'] = env('APP_NAME');
            $body_data['address'] = $order->shipping_street;
            $body_data['mobile_number'] = $order->shipping_mobile_number;
            $body_data['payment_method'] = 'cod';
            $body_data['shipping_charge'] = $order->shipping_charge;

            $body_data['order_items'] = $order_items;
            $response = Http::post(env('COMMON_ORDER_API_URL'), $body_data);
        }

        // Delete Cart
        $session_id = Session::getId();
        if(auth()->check()){
            DB::table('carts')->where('user_id', auth()->user()->id)->delete();
        }else{
            DB::table('carts')->where('session_id', $session_id)->delete();
        }

        return redirect()->route('orderComDetails', $order->id)->with('success-alert', 'Order created success.');
    }

    public function orderComDetails($id)
    {
        $order = Order::findOrFail($id);

        $track = true;
        try{
            if($order->order_tracked == 0){
                $order->order_tracked = 1;
                $order->save();
            }else{
                $track = false;
            }
        }catch(\Exception $e){}

        $products = array();
        $content_ids = array();
        foreach($order->OrderProducts as $i => $product){
            $products[] = [
                'id' => $product->product_id,
                'quantity' => $product->quantity
            ];
            $content_ids[] = $product->product_id;
        }

        return view('front.orderComDetails', compact('order', 'products', 'content_ids', 'track'));
    }
}
