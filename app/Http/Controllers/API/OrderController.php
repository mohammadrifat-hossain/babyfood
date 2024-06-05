<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders($status){
        $orders = Order::where('created_at', ">=", Carbon::now()->subHour(48))->with('OrderProducts');
        if($status != 'all'){
            $orders->where('status', $status);
        }
        $orders = $orders->latest('id')->get();

        $output = array();
        foreach($orders as $key => $order){
            $output[$key]["wp_id"] = $order->id;
            $output[$key]["customer"]["first_name"] = $order->last_name;
            $output[$key]["customer"]["last_name"] = "";
            $output[$key]["customer"]["company"] = "";
            $output[$key]["customer"]["address_1"] = $order->street;
            $output[$key]["customer"]["address_2"] = "";
            $output[$key]["customer"]["city"] = $order->city ?? "";
            $output[$key]["customer"]["state"] = $order->state ?? "";
            $output[$key]["customer"]["postcode"] = $order->zip ?? "";
            $output[$key]["customer"]["country"] = $order->country ?? "";
            $output[$key]["customer"]["email"] = $order->email ?? "";
            $output[$key]["customer"]["phone"] = $order->mobile_number ?? "";
            $output[$key]["total"] = strval($order->grand_total);
            $output[$key]["created_via"] = "checkout";
            $output[$key]["deliveryCharge"] = strval($order->shipping_charge);
            foreach($order->OrderProducts as $o_key => $order_product){
                $output[$key]["products"][$o_key]["product_id"] = $order_product->product_id;
                $output[$key]["products"][$o_key]["product_name"] = $order_product->title;
                $output[$key]["products"][$o_key]["quantity"] = $order_product->quantity;
                $output[$key]["products"][$o_key]["price"] = strval($order_product->sale_price);
                $output[$key]["products"][$o_key]["sku"] = strval($order_product->product_id);
                $output[$key]["products"][$o_key]["image"] = $order_product->Product->img_paths['original'];
            }
            $output[$key]["status"] = $order->status;
        }

        return $output;
    }
}
