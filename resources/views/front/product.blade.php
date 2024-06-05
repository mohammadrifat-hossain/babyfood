@extends('front.layouts.master')
@section('head')
    @include('meta::manager', [
        'title' => $product->title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $product->img_paths['large'],
        'description' => $product->meta_description,
        'keywords' => $product->meta_tags
    ])
@endsection

@section('master')
@include('front.layouts.breadcrumb', [
    'title' => $product->title,
        'url' => $product->route
])

<div class="container">
    <div class="mt-6">
        <div class="grid grid-cols-1 md:grid-cols-9 gap-6">
            <div class="col-span-1 md:col-span-4">
                <img src="{{$product->img_paths['original']}}" alt="{{$product->title}}" class="w-full h-auto object-center shadow-md rounded" width="300" height="160" id="product_preview">

                <div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-2 mt-4">
                    <div class="block shadow cursor-pointer hover:shadow-lg">
                        <img src="{{$product->img_paths['small']}}" onclick="changeProductImage('{{$product->img_paths['original']}}');" width="80" height="80" alt="{{$product->title}}" class="w-full h-20 object-center object-cover">
                    </div>

                    @foreach ($product->Gallery as $gallery)
                        <div class="block shadow cursor-pointer hover:shadow-lg" onclick="changeProductImage('{{$gallery->paths['original']}}');">
                            <img src="{{$gallery->paths['small']}}" width="80" height="80" alt="{{$product->title}}" class="w-full h-20 object-center object-cover">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-span-1 md:col-span-5">
                <h1 class="text-xl md:text-2xl font-semibold tracking-tight text-gray-700">{{$product->title}}</h1>

                <div class="grid grid-cols-12">
                    <div class="col-span-12 md:col-span-8">
                        <p class="text-3xl mt-4" style="color: #dc3545"><span class="single_product_price">{{$product->prices['sale_price']}} tk</span> @if($product->prices['regular_price'] > 0)<span class="text-black line-through text-xl">{{$product->prices['regular_price']}} tk</span>@endif</p>

                        <p class="mt-4 text-sm text-white inline-block px-3 py-0.5 product_code" style="background: #74c951"><span>প্রোডাক্ট কোড: {{$product->id}}</span></p>

                        <div class="sp_variation">
                            @foreach ($product->VariableAttributes as $attribute)
                                <div class="grid grid-cols-12 gap-5 mb-2 mt-2">
                                    <div class="col-span-4 md:col-span-2">
                                        <span class="mr-2 mt-2 d-inline-block"><b>{{$attribute->name}}:</b></span>
                                    </div>

                                    <div class="col-span-8 md:col-span-10">
                                        <ul class="sp_variation_all npnls">
                                            @foreach ($attribute->AttributeItems as $attribute_item)
                                                @if(in_array($attribute_item->id, $product->attribute_items_arr))
                                                <li>
                                                    <input type="radio" name="attr_id_{{$attribute->id}}" id="av_id_{{$attribute_item->id}}" class="co_radio" value="{{$attribute->id . ':' . $attribute_item->id}}">
                                                    <label for="av_id_{{$attribute_item->id}}" class="cartOptions">{{$attribute_item->name}}</label>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-10">
                            <form action="{{route('cart.directOrder')}}" method="get">
                                <p>পরিমান:</p>
                                <input type="hidden" name="product" value="{{$product->id}}">
                                <input type="hidden" name="product_data_id" class="product_data_id" value="">
                                <div class="mb-4 flex">
                                    <button class="w-8 h-8 text-center border-2 border-black cursor-pointer font-bold border-l-0 bg-black text-white" type="button" onclick="updateProQuantity('minus')">-</button>
                                    <input name="quantity" type="number" value="1" id="single_cart_quantity" class="h-8 border-2 border-black px-1 w-10 focus:outline-none text-center rounded-none">
                                    <button class="w-8 h-8 text-center border-2 border-black cursor-pointer font-bold border-r-0 bg-black text-white" type="button" onclick="updateProQuantity('plus')">+</button>
                                </div>

                                <button type="submit" class="bg-primary hover:bg-primary-light border border-transparent rounded-md py-2 px-2 md:px-4 items-center justify-center text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 inline-block w-full md:w-auto">অর্ডার করুন</button>
                            </form>

                            <button type="button" class="bg-primary-light hover:bg-primary border border-transparent rounded-md py-2 px-2 md:px-4 items-center justify-center text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 inline-block mt-2 w-full md:w-auto" onclick="addToCart('{{$product->id}}')">কার্ট-এ যোগ করুন</button>

                            <a href="tel:{{$settings_g['mobile_number'] ?? ''}}" class="bg-green-800 hover:bg-green-600 border border-transparent rounded py-2 px-2 md:px-4 items-center justify-center text-base font-medium text-white block w-full mt-3 text-center">ফোনে অর্ডার করুনঃ {{$settings_g['mobile_number']}}</a>

                            @if($settings_g['messenger_link'] ?? null)
                            <a href="{{$settings_g['messenger_link'] ?? ''}}" class="bg-sky-500 hover:bg-sky-400 border border-transparent rounded py-2 px-2 md:px-4 items-center justify-center text-base font-medium text-white block w-full mt-3 text-center">ম্যাসেজের মাধ্যমে অর্ডার করতে ক্লিক করুন</a>
                            @endif
                        </div>

                        <table class="w-full mt-4 text-black text-sm">
                            <tbody>
                                <tr>
                                    <td style="padding-left: 0;border-bottom: 1px solid #ddd;">
                                    ঢাকার ভিতরে ডেলিভারি
                                    </td>
                                    <td style="border-bottom: 1px solid #ddd;">
                                    <b>৳ {{env('INSIDE_DHAKA_DELIVERY_CHARGE')}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 0;border-bottom: 1px solid #ddd;">
                                    ঢাকার বাইরে ডেলিভারি
                                    </td>
                                    <td style="border-bottom: 1px solid #ddd;">
                                    <b>৳ {{env('OUTSIDE_DHAKA_DELIVERY_CHARGE')}}</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="my-10 w-full overflow-hidden">
        <div class="border">
            <h2 class="bg-primary py-1 px-2 font-semibold text-white mb-2">পন্যের বিবরণ</h2>

            <div class="px-3 mb-2 responsive_video">
                {!! $product->description !!}
            </div>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="bg-primary py-1 px-2 font-semibold rounded text-white mb-4">রিলেটেড প্রোডাক্ট</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 mb-3">
            @foreach ($related_products as $related_product)
                @if($related_product)
                    @include('front.layouts.product-loop', [
                        'product' => $related_product
                    ])
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="{{asset('front/fitvids.js/jquery.fitvids.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".responsive_video").fitVids();
        });
    </script>

    @if(env('APP_FB_TRACK'))
    <script>
        fbq('track', 'ViewContent', {
            value: '{{$product->prices["sale_price"]}}',
            currency: 'BDT',
            content_ids: '{{$product->id}}',
            content_type: 'product',
        });
    </script>
    @endif

    @if(Info::Settings('fb_api', 'track') == 'Yes')
    <script>
        // FB Conversion Track(PageView)
        $(window).on('load', function() {
            $.ajax({
                type: "POST",
                url: "{{ route('fbTrack') }}",
                data: {
                    _token: '{{csrf_token()}}',
                    track_type: 'ViewContent',
                    data: {
                        value: '{{$product->prices["sale_price"]}}',
                        currency: 'BDT',
                        content_ids: '{{$product->id}}',
                        content_type: 'product',
                    }
                },
                success: function (response) {
                    if(response == 'true'){
                        console.log('FB Tracked Page Viewed!');
                    }else{
                        console.log('FB Tracked Failed');
                    }
                },
                error: function(){
                    console.log('FB Tracked Error Page View!');
                }
            });
        });
    </script>
    @endif

    <script>
        // Get Variable price
        $(document).on('change', '.co_radio', function () {
            // Get Data
            let product = "{{$product->id}}";
            let attribute_values = $("input.co_radio:checked").map(function () {
                return $(this).val();
            });

            let values = attribute_values.get();
            values = values.sort();

            // Ajax Action
            $.ajax({
                url: "{{route('product.variationPrice')}}",
                method: "POST",
                data: {values, product, _token: "{{csrf_token()}}"},
                dataType: "JSON",
                success: function (result) {
                    if(result.status == true){
                        // $('.add_to_cart').removeClass('disabled');
                        // $('.no_stock_alert').hide();
                        $('.single_product_price').html(result.sale_price + ' tk');
                        $('.product_data_id').val(result.product_data_id);
                        // $('.maximum_stock').val(result.stock);
                        // $('.cart_quantity_input').val(1);
                    }else{
                        $('.product_data_id').val('');
                    }

                    // if(result.sku){
                    //     $('.sku_code').html(result.sku);
                    // }else{
                    //     $('.sku_code').html('N/A');
                    // }
                },
                error: function (){
                    console.log('Variation price ajax error!');
                }
            });
        });
    </script>
@endsection
