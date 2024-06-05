<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FeatureAds;
use App\Models\LandingBuilder;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductData;
use App\Models\Slider;
use App\Models\SpecialOffer;
use App\Models\Testimonial;
use App\Repositories\FBConversionRepo;
use Illuminate\Http\Request;
use App\Repositories\ProductRepo;
use Info;

class PageController extends Controller
{
    // Homepage
    public function homepage(Request $request)
    {
        // $featured_categories = Category::where('for', 'product')->where('feature', 1)->active()->get();
        // $sliders = Slider::active()->get();
        // $testimonials = Testimonial::where('status', 1)->latest('id')->get();
        // $special_offers = SpecialOffer::with('product', 'product.ProductData')->where('status', 1)->orderBy('position')->take(3)->get();
        // $feature_ads = FeatureAds::where('placement', 'Place 1')->orderBy('position')->take(3)->get();
        if(!$request->page){
            $products = cache()->remember('homepage_products', (60 * 60 * 24 * 90), function(){
                return Product::active()->select('id', 'title', 'image_path', 'image', 'regular_price', 'sale_price', 'slug')->paginate(24);
            });
        }else{
            $products = Product::active()->select('id', 'title', 'image_path', 'image', 'regular_price', 'sale_price', 'slug')->paginate(24);
        }

        $categories = cache()->remember('homepage_categories', (60 * 60 * 24 * 90), function(){
            return Category::where('for', 'product')->where('category_id', null)->active()->select('id', 'title', 'slug')->get();
        });

        $hot_deals = cache()->remember('hot_deals', (60 * 60 * 24 * 90), function(){
            return Product::where('spacial_offer', 1)->active(12)->select('id', 'title', 'image_path', 'image', 'regular_price', 'sale_price', 'slug')->get();
        });

        $sliders = cache()->remember('sliders', (60 * 60 * 24 * 90), function(){
            return Slider::active()->get();
        });

        return view('front.homepage', compact('products', 'categories', 'hot_deals', 'sliders'));
    }

    public function category($id){
        $category = Category::where('id', $id)->active()->firstOrFail();
        // $products = ProductRepo::filter($category->id, [], [], [], [], 0, 24, 'DESC');
        $product_ids = ProductCategory::where('category_id', $category->id)->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $product_ids)->active()->paginate(28);

        return view('front.category', compact('category', 'products'));
    }

    public function search(Request $request){
        $search = $request->search;
        $products = Product::query();
        $products->active();
        $products->where(function($q) use ($search){
            $q->where('id', $search)->orWhere('title', 'LIKE', "%$search%");
        });
        $total_count = $products->count();
        $products = $products->paginate(28);

        return view('front.search', compact('products', 'total_count', 'search'));
    }

    public function product($product){
        $product = Product::where('slug', $product)->active()->firstOrFail();

        $cids = $product->Categories->pluck('id')->toArray();
        $related_products = ProductCategory::with('Product')
            ->join('products', 'products.id', '=', 'product_categories.product_id')
            ->where('products.status', 1)
            ->where('products.deleted_at', null)
            ->whereIn('category_id', $cids)
            ->where('product_categories.product_id', '!=', $product->id)
            ->select('product_categories.product_id')
            ->distinct()
            ->latest('product_categories.product_id')
            ->take(24)->get();
        $related_products = $related_products->pluck('Product');

        return view('front.product', compact('product', 'related_products'));
    }

    public function allHotDeals(){
        $products = Product::where('spacial_offer', 1)->active()->select('id', 'title', 'image_path', 'image', 'regular_price', 'sale_price', 'slug')->paginate(28);

        return view('front.allHotDeals', compact('products'));
    }

    public function variationPrice(Request $request){
        $output = [
            'status' => false,
            'price' => '',
            'sku' => '',
            'product_data_id' => '',
            'stock' => ''
        ];

        $product = $request->product;
        $attr_values = $request->values;

        $attr_values_string = implode(',', $attr_values) . ',';

        $product_data = ProductData::where('product_id', $product)->where('attribute_item_ids', $attr_values_string)->first();

        if($product_data){
            $output['status'] = true;
            $output['sale_price'] = $product_data->sale_price;
            $output['sku'] = $product_data->sku_code;
            $output['product_data_id'] = $product_data->id;
            $output['stock'] = $product_data->stock;
        }

        return $output;
    }

    public function fbTrack(Request $request){
        if(Info::Settings('fb_api', 'track') == 'Yes'){
            if(count((array)$request->data)){
                return FBConversionRepo::track($request->track_type, ((array)$request->data));
            }
            return FBConversionRepo::track($request->track_type);
        }

        return 'false';
    }

    public function landing($id){
        try{
            $landing = LandingBuilder::find($id);
            $products = Product::whereIn('id', $landing->products_id)->get();
            if(!count($products)){
                abort(404);
            }
            $product = $products[0];
            $states = cache()->remember('get_states', (60 * 60 * 24 * 90), function(){
                $json = json_decode(file_get_contents('https://oms.cutpricebd.com/api/v2/get-states'), true);
                if(isset($json['data'])){
                    return $json['data'];
                }
                return [];
            });

            return view('landing.showBuilder', compact('landing', 'products', 'product', 'states'));
        }catch(\Exception $e){
            abort(404);
        }
    }

    public function lp($id){
        try{
            $landing = LandingBuilder::with('product')->whereHas('product')->findOrFail($id);
            $product = $landing->product;
            $states = cache()->remember('get_states', (60 * 60 * 24 * 90), function(){
                $json = json_decode(file_get_contents('https://oms.cutpricebd.com/api/v2/get-states'), true);
                if(isset($json['data'])){
                    return $json['data'];
                }
                return [];
            });

            return view('landing.showBuilderB', compact('landing', 'product', 'states'));
        }catch(\Exception $e){
            abort(404);
        }
    }
}
