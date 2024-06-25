@extends('front.layouts.master')
@section('head')
    @include('meta::manager', [
        'title' => $product->title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $product->img_paths['large'],
        'description' => $product->meta_description,
        'keywords' => $product->meta_tags
    ])

    <link href="{{asset('front/magiczoomplus.css')}}?c=1" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{asset('front/OwlCarousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/OwlCarousel/dist/assets/owl.theme.default.min.css')}}">
@endsection

@section('master')
<div class="container">
    @include('front.layouts.breadcrumb', [
        'title' => $product->title,
        'url' => $product->route
    ])

    <div class="mt-6">
        <div class="grid grid-cols-1 md:grid-cols-9 gap-14">
            <div class="col-span-1 md:col-span-4">
                <div class="grid grid-cols-8 gap-2">
                    <div class="hidden md:block">
                        <div class="grid grid-cols-1 gap-2">
                            <a data-slide-id="zoom" data-zoom-id="zoom-v" href="{{$product->img_paths['original']}}" data-image="{{$product->img_paths['original']}}" data-zoom-id="zoom-v" class="block shadow cursor-pointer hover:shadow-lg">
                                <img src="{{$product->img_paths['small']}}" onclick="changeProductImage('{{$product->img_paths['original']}}');" width="80" height="80" alt="{{$product->title}}" class="w-full h-20 object-center object-cover">
                            </a>

                            @foreach ($product->Gallery as $gallery)
                                <div data-slide-id="zoom" data-zoom-id="zoom-v" href="{{$gallery->paths['original']}}" data-image="{{$gallery->paths['original']}}" class="block shadow cursor-pointer hover:shadow-lg" onclick="changeProductImage('{{$gallery->paths['original']}}');">
                                    <img src="{{$gallery->paths['small']}}" width="80" height="80" alt="{{$product->title}}" class="w-full h-20 object-center object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-8 md:col-span-7">
                        <div class="zoom-gallery real">
                            <a href="{{$product->img_paths['original']}}" class="MagicZoom" id="zoom-v" data-options="zoomMode:true; zoomOn:'hover';">
                                <img src="{{$product->img_paths['original']}}" alt="{{$product->title}}" class="w-full h-auto object-center shadow-md" width="300" height="160" id="product_preview">
                            </a>
                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-2 mt-4 md:hidden">
                            <a data-slide-id="zoom" data-zoom-id="zoom-v" href="{{$product->img_paths['original']}}" data-image="{{$product->img_paths['original']}}" data-zoom-id="zoom-v" class="block shadow cursor-pointer hover:shadow-lg">
                                <img src="{{$product->img_paths['small']}}" onclick="changeProductImage('{{$product->img_paths['original']}}');" width="80" height="80" alt="{{$product->title}}" class="w-full h-20 object-center object-cover">
                            </a>

                            @foreach ($product->Gallery as $gallery)
                                <div data-slide-id="zoom" data-zoom-id="zoom-v" href="{{$gallery->paths['original']}}" data-image="{{$gallery->paths['original']}}" class="block shadow cursor-pointer hover:shadow-lg" onclick="changeProductImage('{{$gallery->paths['original']}}');">
                                    <img src="{{$gallery->paths['small']}}" width="80" height="80" alt="{{$product->title}}" class="w-full h-20 object-center object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1 md:col-span-5">
                <h1 class="text-sm md:text-2xl font-medium tracking-tight text-[#222]">{{$product->title}}</h1>

                <p class="mt-4 text-xl text-[#7d7d7d] font-medium mb-8"><span class="single_product_price">{{$product->prices['sale_price']}} Tk</span> @if($product->prices['regular_price'] > 0)<span class="text-black line-through text-xl">{{$product->prices['regular_price']}} Tk</span>@endif</p>

                <div class="sp_variation mb-8">
                    @foreach ($product->VariableAttributes as $attribute)
                        <div><span class="mr-2 mt-2 d-inline-block"><b>{{$attribute->name}}:</b></span></div>

                        <ul class="sp_variation_all npnls overflow-hidden">
                            @foreach ($attribute->AttributeItems as $attribute_item)
                                @if(in_array($attribute_item->id, $product->attribute_items_arr))
                                <li>
                                    <input type="radio" name="attr_id_{{$attribute->id}}" id="av_id_{{$attribute_item->id}}" class="co_radio" value="{{$attribute->id . ':' . $attribute_item->id}}">
                                    <label for="av_id_{{$attribute_item->id}}" class="cartOptions">{{$attribute_item->name}}</label>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    @endforeach
                </div>

                <button type="button" class="hover:bg-[#222] border border-[#222] py-2 px-2 md:px-4 items-center justify-center text-base font-medium hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 block mt-2 w-full mb-2" onclick="addToCart('{{$product->id}}')">Add to Cart</button>

                <a style="display: block" href="{{route('cart.directOrder', ['product' => $product->id])}}" class="bg-[#222] hover:bg-[#c35b58] border border-transparent py-2 px-2 md:px-4 items-center justify-center text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 block w-full">BUY IT NOW</a>

                <h2 class="font-semibold mb-2 text-xl mt-4">Description</h2>
                <input name="quantity" type="hidden" value="1" id="single_cart_quantity">

                <div class="mb-2 responsive_video">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center">
        <h2 class="relative text-2xl mt-12 mb-10"><span class="w-6 md:w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span> <span class="text-black">Related Products</span> <span class="w-6 md:w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span></h2>

        <div class="owl-carousel_normal owl-carousel owl-theme mb-10">
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
    <script src="{{asset('front/OwlCarousel/dist/owl.carousel.min.js')}}"></script>

    <script src="{{asset('front/magiczoomplus.js')}}?c=1"></script>

    <script>
        $('.owl-carousel_normal').owlCarousel({
            items: 4,
            loop: true,
            video: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
                0: {
                    items: 2,
                    margin: 10,
                },
                600: {
                    items: 3,
                    margin: 20,
                },
                1000: {
                    items: 4,
                    margin: 30,
                }
            },
            lazyLoad: false
        });
    </script>

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
