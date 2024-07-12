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

    <!-- <div class="mt-6">
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

                <a style="display: block;text-align: center;" href="{{route('cart.directOrder', ['product' => $product->id])}}" class="bg-[#222] hover:bg-[#c35b58] border border-transparent py-2 px-2 md:px-4 items-center justify-center text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 block w-full">BUY IT NOW</a>

                <h2 class="font-semibold mb-2 text-xl mt-4">Description</h2>
                <input name="quantity" type="hidden" value="1" id="single_cart_quantity">

                <div class="mb-2 responsive_video">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </div> -->
    <div>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">


        <div class="flex items-center justify-center">
          <div class="flex flex-col gap-3">
            <div class="border flex items-center justify-center rounded-lg">
              <img src="https://png.pngtree.com/png-clipart/20221001/ourmid/pngtree-fast-food-big-ham-burger-png-image_6244235.png"/>
            </div>
            <div class="flex gap-3 items-center justify-between">
              <img src="https://png.pngtree.com/png-clipart/20221001/ourmid/pngtree-fast-food-big-ham-burger-png-image_6244235.png" class="w-[100px] md:w-[130px] border rounded-lg cursor-pointer hover:opacity-70 transition-all"/>
              <img src="https://png.pngtree.com/png-clipart/20221001/ourmid/pngtree-fast-food-big-ham-burger-png-image_6244235.png" class="w-[100px] md:w-[130px] border rounded-lg cursor-pointer hover:opacity-70 transition-all"/>
              <img src="https://png.pngtree.com/png-clipart/20221001/ourmid/pngtree-fast-food-big-ham-burger-png-image_6244235.png" class="w-[100px] md:w-[130px] border rounded-lg cursor-pointer hover:opacity-70 transition-all"/>
            </div>
          </div>
        </div>


        <div>
          <div class="flex flex-col gap-3 text-wrap">
            <h4 class="text-orange-500 uppercase text-xs font-bold">Category Name</h4>
            <h2 class="text-4xl font-bold">Fresh & Healthy Burger | Good for health</h2>
            <div class="flex items-end gap-2">
              <h5 class="text-2xl font-semibold">$599 /</h5>
              <span class="text-neutral-500 line-through">$799</span>
              <span class="bg-orange-100  text-orange-500 px-2 rounded">5% off</span>
            </div>
            <div>
              (<span class="text-green-500">In Stock</span>)
            </div>
            <div>
                <span class="text-lg">4.5</span>
              <span class="text-orange-400 text-sm">(342 reviews)</span>
            </div>

            <div class="mt-5 flex items-center gap-4 justify-center md:justify-start">
              
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>
                </button>
              
                <input type="number" value="1" class="border outline-none px-4 py-2 max-w-[80px] text-center" min="0" readonly>

              
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>

            </div>


            <div class="flex items-center gap-3 mt-5 justify-center md:justify-start">
                <button class="box-border relative z-30 inline-flex items-center justify-center w-auto px-8 py-3 overflow-hidden font-bold text-white transition-all duration-300 bg-indigo-600 rounded-full cursor-pointer group ring-offset-2 ring-1 ring-indigo-300 ring-offset-indigo-200 hover:ring-offset-indigo-500 ease focus:outline-none">
                    <span class="absolute bottom-0 right-0 w-8 h-20 -mb-8 -mr-5 transition-all duration-300 ease-out transform rotate-45 translate-x-1 bg-white opacity-10 group-hover:translate-x-0"></span>
                    <span class="absolute top-0 left-0 w-20 h-8 -mt-1 -ml-12 transition-all duration-300 ease-out transform -rotate-45 -translate-x-1 bg-white opacity-10 group-hover:translate-x-0"></span>
                    <span class="relative z-20 flex items-center text-sm justify-center gap-2">
                        <span>Buy Now</span>
                    </span>
                </button>

                <button class="rounded-full px-3.5 py-2 m-1 overflow-hidden relative group cursor-pointer border-2 font-medium border-indigo-600 text-indigo-600 flex items-center justify-center gap-2">
                    <span class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 relative group-hover:text-white transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease mt-1">
                        Add to Cart
                    </span>
                </button>
            </div>

            <div class="flex items-center flex-col md:flex-row gap-3 mt-5">
                <div class="flex items-center justify-center gap-3 px-3 rounded">
                    <div>
                        <img src="https://cdn-icons-png.flaticon.com/512/66/66841.png" alt="delivery icon" loading="lazy" class="w-12">
                    </div>
                    <div>
                        <p class="text-xl">Fast Delivery</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 px-3 rounded">
                    <div>
                        <img src="https://media.istockphoto.com/id/1360644683/vector/24-hour-icon-rotating-arrow-vector.jpg?s=612x612&w=0&k=20&c=frnqCBtIDuBFwRUyp0BcYQlOIStT7voGzpL6KbIvm0I=" alt="delivery icon" loading="lazy" class="w-12">
                    </div>
                    <div>
                        <p class="text-xl">24/7 Customer Service</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 flex items-center">
                <a href="whatsapp://send?phone=+8801784222255&text=Hello!%20I%20need%20help%20regarding%20landscape%20service" class="flex items-center gap-2 text-lg font-bold border px-3 py-1 rounded-lg transition-all hover:shadow-lg">
                    <img src="https://pngimg.com/d/whatsapp_PNG21.png" alt="whatsapp" class="w-[30px]">
                    <span class="text-sm">WhatsApp</span>
                </a>
            </div>
            
            
          </div>
        </div>
        
      </div>

      <div class="mt-5 border-t pt-5">
            <span class="text-lg font-semibold text-orange-500">Description:</span>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil incidunt ex labore earum iure? Accusantium voluptatibus tempore, et, reiciendis in quis architecto debitis eum aliquam excepturi perferendis. Delectus quasi veniam laudantium ut nobis at in voluptatem magnam, sit eaque sapiente. Maxime sint quisquam rerum ratione optio cupiditate iusto, repellendus labore?</p><br>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil incidunt ex labore earum iure? Accusantium voluptatibus tempore, et, reiciendis in quis architecto debitis eum aliquam excepturi perferendis. Delectus quasi veniam laudantium ut nobis at in voluptatem magnam, sit eaque sapiente. Maxime sint quisquam rerum ratione optio cupiditate iusto, repellendus labore?</p><br>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil incidunt ex labore earum iure? Accusantium voluptatibus tempore, et, reiciendis in quis architecto debitis eum aliquam excepturi perferendis. Delectus quasi veniam laudantium ut nobis at in voluptatem magnam, sit eaque sapiente. Maxime sint quisquam rerum ratione optio cupiditate iusto, repellendus labore?</p><br>
        </div>


        <!-- reviews TODO: remove if unnecessary -->
        <section class="py-24 relative">
            <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">
                <div class="w-full">
                    <h2 class="font-manrope font-bold text-4xl text-black mb-8 text-center">Our customer reviews
                    </h2>
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-11 pb-11 border-b border-gray-100 max-xl:max-w-2xl max-xl:mx-auto">
                        <div class="box flex flex-col gap-y-4 w-full ">
                            <div class="flex items-center w-full">
                                <p class="font-medium text-lg text-black mr-0.5">5</p>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_12042_8589)">
                                        <path
                                            d="M9.10326 2.31699C9.47008 1.57374 10.5299 1.57374 10.8967 2.31699L12.7063 5.98347C12.8519 6.27862 13.1335 6.48319 13.4592 6.53051L17.5054 7.11846C18.3256 7.23765 18.6531 8.24562 18.0596 8.82416L15.1318 11.6781C14.8961 11.9079 14.7885 12.2389 14.8442 12.5632L15.5353 16.5931C15.6754 17.41 14.818 18.033 14.0844 17.6473L10.4653 15.7446C10.174 15.5915 9.82598 15.5915 9.53466 15.7446L5.91562 17.6473C5.18199 18.033 4.32456 17.41 4.46467 16.5931L5.15585 12.5632C5.21148 12.2389 5.10393 11.9079 4.86825 11.6781L1.94038 8.82416C1.34687 8.24562 1.67438 7.23765 2.4946 7.11846L6.54081 6.53051C6.86652 6.48319 7.14808 6.27862 7.29374 5.98347L9.10326 2.31699Z"
                                            fill="#FBBF24" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_12042_8589">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="h-2 w-full sm:min-w-[278px] rounded-3xl bg-amber-50 ml-5 mr-3">
                                    <span class="h-full w-[30%] rounded-3xl bg-amber-400 flex"></span>
                                </p>
                                <p class="font-medium text-lg  text-black mr-0.5">989</p>
                            </div>
                            <div class="flex items-center w-full">
                                <p class="font-medium text-lg text-black mr-0.5">4</p>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_12042_8589)">
                                        <path
                                            d="M9.10326 2.31699C9.47008 1.57374 10.5299 1.57374 10.8967 2.31699L12.7063 5.98347C12.8519 6.27862 13.1335 6.48319 13.4592 6.53051L17.5054 7.11846C18.3256 7.23765 18.6531 8.24562 18.0596 8.82416L15.1318 11.6781C14.8961 11.9079 14.7885 12.2389 14.8442 12.5632L15.5353 16.5931C15.6754 17.41 14.818 18.033 14.0844 17.6473L10.4653 15.7446C10.174 15.5915 9.82598 15.5915 9.53466 15.7446L5.91562 17.6473C5.18199 18.033 4.32456 17.41 4.46467 16.5931L5.15585 12.5632C5.21148 12.2389 5.10393 11.9079 4.86825 11.6781L1.94038 8.82416C1.34687 8.24562 1.67438 7.23765 2.4946 7.11846L6.54081 6.53051C6.86652 6.48319 7.14808 6.27862 7.29374 5.98347L9.10326 2.31699Z"
                                            fill="#FBBF24" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_12042_8589">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="h-2 w-full xl:min-w-[278px] rounded-3xl bg-amber-50 ml-5 mr-3">
                                    <span class="h-full w-[40%] rounded-3xl bg-amber-400 flex"></span>
                                </p>
                                <p class="font-medium text-lg text-black mr-0.5">4.5K</p>
                            </div>
                            <div class="flex items-center">
                                <p class="font-medium text-lg text-black mr-0.5">3</p>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_12042_8589)">
                                        <path
                                            d="M9.10326 2.31699C9.47008 1.57374 10.5299 1.57374 10.8967 2.31699L12.7063 5.98347C12.8519 6.27862 13.1335 6.48319 13.4592 6.53051L17.5054 7.11846C18.3256 7.23765 18.6531 8.24562 18.0596 8.82416L15.1318 11.6781C14.8961 11.9079 14.7885 12.2389 14.8442 12.5632L15.5353 16.5931C15.6754 17.41 14.818 18.033 14.0844 17.6473L10.4653 15.7446C10.174 15.5915 9.82598 15.5915 9.53466 15.7446L5.91562 17.6473C5.18199 18.033 4.32456 17.41 4.46467 16.5931L5.15585 12.5632C5.21148 12.2389 5.10393 11.9079 4.86825 11.6781L1.94038 8.82416C1.34687 8.24562 1.67438 7.23765 2.4946 7.11846L6.54081 6.53051C6.86652 6.48319 7.14808 6.27862 7.29374 5.98347L9.10326 2.31699Z"
                                            fill="#FBBF24" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_12042_8589">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="h-2 w-full xl:min-w-[278px] rounded-3xl bg-amber-50 ml-5 mr-3">
                                    <span class="h-full w-[20%] rounded-3xl bg-amber-400 flex"></span>
                                </p>
                                <p class="font-medium text-lg text-black mr-0.5">50</p>
                            </div>
                            <div class="flex items-center">
                                <p class="font-medium text-lg text-black mr-0.5">2</p>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_12042_8589)">
                                        <path
                                            d="M9.10326 2.31699C9.47008 1.57374 10.5299 1.57374 10.8967 2.31699L12.7063 5.98347C12.8519 6.27862 13.1335 6.48319 13.4592 6.53051L17.5054 7.11846C18.3256 7.23765 18.6531 8.24562 18.0596 8.82416L15.1318 11.6781C14.8961 11.9079 14.7885 12.2389 14.8442 12.5632L15.5353 16.5931C15.6754 17.41 14.818 18.033 14.0844 17.6473L10.4653 15.7446C10.174 15.5915 9.82598 15.5915 9.53466 15.7446L5.91562 17.6473C5.18199 18.033 4.32456 17.41 4.46467 16.5931L5.15585 12.5632C5.21148 12.2389 5.10393 11.9079 4.86825 11.6781L1.94038 8.82416C1.34687 8.24562 1.67438 7.23765 2.4946 7.11846L6.54081 6.53051C6.86652 6.48319 7.14808 6.27862 7.29374 5.98347L9.10326 2.31699Z"
                                            fill="#FBBF24" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_12042_8589">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="h-2 w-full xl:min-w-[278px] rounded-3xl bg-amber-50 ml-5 mr-3">
                                    <span class="h-full w-[16%] rounded-3xl bg-amber-400 flex"></span>
                                </p>
                                <p class="font-medium text-lg text-black mr-0.5">16</p>
                            </div>
                            <div class="flex items-center">
                                <p class="font-medium text-lg text-black mr-0.5">1</p>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_12042_8589)">
                                        <path
                                            d="M9.10326 2.31699C9.47008 1.57374 10.5299 1.57374 10.8967 2.31699L12.7063 5.98347C12.8519 6.27862 13.1335 6.48319 13.4592 6.53051L17.5054 7.11846C18.3256 7.23765 18.6531 8.24562 18.0596 8.82416L15.1318 11.6781C14.8961 11.9079 14.7885 12.2389 14.8442 12.5632L15.5353 16.5931C15.6754 17.41 14.818 18.033 14.0844 17.6473L10.4653 15.7446C10.174 15.5915 9.82598 15.5915 9.53466 15.7446L5.91562 17.6473C5.18199 18.033 4.32456 17.41 4.46467 16.5931L5.15585 12.5632C5.21148 12.2389 5.10393 11.9079 4.86825 11.6781L1.94038 8.82416C1.34687 8.24562 1.67438 7.23765 2.4946 7.11846L6.54081 6.53051C6.86652 6.48319 7.14808 6.27862 7.29374 5.98347L9.10326 2.31699Z"
                                            fill="#FBBF24" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_12042_8589">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="h-2 w-full xl:min-w-[278px] rounded-3xl bg-amber-50 ml-5 mr-3">
                                    <span class="h-full w-[8%] rounded-3xl bg-amber-400 flex"></span>
                                </p>
                                <p class="font-medium text-lg py-[1px] text-black mr-0.5">8</p>
                            </div>
                        </div>
                        <div class="p-8 bg-amber-50 rounded-3xl flex items-center justify-center flex-col">
                            <h2 class="font-manrope font-bold text-5xl text-amber-400 mb-6">
                                4.3</h2>
                            <div class="flex items-center justify-center gap-2 sm:gap-6 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            </div>
                            <p class="font-medium text-xl leading-8 text-gray-900 text-center">46 Ratings</p>
                        </div>
                    </div>

                    <div class="pt-11 pb-8 border-b border-gray-100 max-xl:max-w-2xl max-xl:mx-auto">
                        <div class="flex items-center gap-3 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </div>
                        <h3 class="font-manrope font-semibold text-xl sm:text-2xl leading-9 text-black mb-6">Outstanding Experience!!!
                        </h3>
                        <div class="flex sm:items-center flex-col min-[400px]:flex-row justify-between gap-5 mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://pagedone.io/asset/uploads/1704349572.png" alt="John image" class="w-8 h-8">
                                <h6 class="font-semibold text-lg leading-8 text-indigo-600 ">John Watson</h6>
                            </div>
                            <p class="font-normal  leading-8 text-gray-400">Nov 01, 2023</p>
                        </div>
                        <p class="font-normal  leading-8 text-gray-400 max-xl:text-justify">One of the standout features of Pagedone is its intuitive and user-friendly interface. Navigating through the system feels natural, and the layout makes it easy to locate and utilize various design elements. This is particularly beneficial for designers looking to streamline their workflow.</p>
                    </div>
                    <div class="pt-8 max-xl:max-w-2xl max-xl:mx-auto">
                        <div class="flex items-center gap-3 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFA500" viewBox="0 0 24 24" stroke-width="1.5" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>

                        </div>
                        
                        <div class="flex sm:items-center flex-col min-[400px]:flex-row justify-between gap-5 mb-4">
                            <div class="flex items-center gap-3">
                                <img src="https://pagedone.io/asset/uploads/1704351103.png" alt="Robert image" class="w-8 h-8">
                                <h6 class="font-semibold text-lg leading-8 text-indigo-600">Robert Karmazov</h6>
                            </div>
                            <p class="font-normal leading-8 text-gray-400">Nov 01, 2023</p>
                        </div>
                        <p class="font-normal  leading-8 text-gray-400 max-xl:text-justify">Pagedone doesn't disappoint when it comes to the variety and richness of its design components. From pre-built templates to customizable elements, the system caters to both beginners and seasoned designers. The extensive library ensures a diverse range of options to bring creative visions to life.</p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- reviews end -->


        <div class="flex items-center md:items-start justify-center md:justify-between flex-col md:flex-row gap-5 mt-10">
            <div class="p-3 w-full">
                <h2 class="text-3xl font-bold flex items-center justify-between">Related Products
                    <a href="/shop" class="relative inline-block px-4 py-2 font-medium group text-base">
                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                        <span class="relative text-black group-hover:text-white transition-all">View More</span>
                    </a>
                </h2>
                
                <div class="mt-5">
                    <div>
                        
                        <!-- card start -->
                        <div class="owl-carousel owl-carousel_normal">
                            <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                                <img class="max-w-[200px] mx-auto" src="https://png.pngtree.com/png-clipart/20230526/ourmid/pngtree-vegetables-and-fruits-in-a-basket-made-with-generative-ai-png-image_7110313.png" alt="Product Name" />
                                <div class="p-3 md:p-6">
                                    <div class="flex items-baseline">
                                    <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                                    <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                        <h4>babyFood</h4>
                                    </div>
                                    </div>
                                    <h2 class="mt-2 font-semibold leading-tight truncate">Healthy Burger for your health</h2>

                                    <div class="flex items-center justify-between flex-col md:flex-row mt-3">
                                        <div class="">
                                            <div class="flex items-center">
                                                <span class="font-bold text-xl">৳599</span>
                                                <h3 class="text-gray-600 text-sm flex items-center">/ <span class="line-through">600</span></h3>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-teal-600 font-semibold">
                                                <span>4.4</span>
                                            </span>
                                            <span class="ml-2 text-gray-600 text-sm">(34 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex items-center justify-between ">
                                        <button class="px-3 md:px-5 py-2 rounded-full bg-green-700 text-white hover:bg-green-800">Buy Now</button>
                                        <div class="cursor-pointer flex items-center justify-center gap-1 group xl:px-2 xl:py-1 xl:rounded-full xl:border">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 group-hover:text-green-700">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                            <span class="mt-1 group-hover:text-green-700 hidden xl:block">Add to Cart</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card end -->
                    </div>
                </div>
            </div>
        </div>
                                            
    </div>



    

    <!-- <div class="mt-6 text-center">
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
    </div> -->
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
                },
                1400: {
                    items: 5,
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
