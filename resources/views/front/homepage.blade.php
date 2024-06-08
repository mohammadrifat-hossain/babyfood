@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => ($settings_g['title'] ?? env('APP_NAME')) . ' - ' . ($settings_g['slogan'] ?? env('APP_NAME')),
        'description' => $settings_g['meta_description'] ?? '',
        'keywords' => $settings_g['keywords'] ?? '',
    ])

    <link rel="stylesheet" href="{{asset('front/OwlCarousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/OwlCarousel/dist/assets/owl.theme.default.min.css')}}">
@endsection

@section('master')
    <div class="container">
        <div id="carouselExampleCaptions" class="relative" data-te-carousel-init data-te-ride="carousel">
            <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                @foreach ($sliders as $slider)
                    <div class="relative float-left -mr-[100%] {{ $loop->index == 0 ? '' : 'hidden' }} w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        {{ $loop->index == 0 ? 'data-te-carousel-active' : '' }} data-te-carousel-item
                        style="backface-visibility: hidden">
                        <img src="{{$slider->img_paths['original']}}" class="block w-full" alt="{{$slider->text_1}}" />
                    </div>
                @endforeach

                <button
                    class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button" data-te-target="#carouselExampleCaptions" data-te-slide="prev">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </span>
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                </button>

                <button
                    class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button" data-te-target="#carouselExampleCaptions" data-te-slide="next">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-6">
        <div class="grid grid-cols-4 gap-4">
            <div class="flex gap-4">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-[#9e9e9e]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                </div>
                <div class="flex-grow text-left">
                    <h2 class="font-semibold">Worldwide Shipping</h2>
                    <p class="text-sm text-[#878787] font-medium">Free Shipping worldwide</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-[#9e9e9e]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                </div>
                <div class="flex-grow text-left">
                    <h2 class="font-semibold">Secured Payment</h2>
                    <p class="text-sm text-[#878787] font-medium">Safe and secure Payment</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-[#9e9e9e] mt-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                </div>
                <div class="flex-grow text-left">
                    <h2 class="font-semibold">24/7 Support</h2>
                    <p class="text-sm text-[#878787] font-medium">Around the clock support</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-[#9e9e9e]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </div>
                <div class="flex-grow text-left">
                    <h2 class="font-semibold">Custom Fitting</h2>
                    <p class="text-sm text-[#878787] font-medium">Available for all customers</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h2 class="relative text-2xl mt-12 mb-10"><span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span> <span class="text-black">Featured Categories</span> <span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span></h2>

            <div class="grid grid-cols-4 gap-7 mb-10">
                @foreach ($categories as $key => $category)
                    @if($key < 4)
                    <a href="{{$category->route}}" class="relative overflow-hidden group">
                        <img src="{{$category->img_paths['medium']}}" alt="{{$category->title}}">

                        <div class="absolute left-0 bottom-4 w-full">
                            <span class="bg-white px-4 py-2.5 inline-block text-sm font-semibold hover:bg-[#222] hover:text-white t transition duration-300">{{$category->title}}</span>
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>

            @foreach ($home_blocks as $key => $home_block)
                <h2 class="relative text-2xl mt-12 mb-10"><span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span> <span class="text-black">{{$home_block->title}}</span> <span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span></h2>

                @php
                    $products = $home_block->Products()->with('Gallery')->latest('id')->take(20)->get();
                @endphp

                <div class="owl-carousel_normal owl-carousel owl-theme mb-10">
                    @foreach ($products as $product)
                        @include('front.layouts.product-loop')
                    @endforeach
                </div>

                <a href="{{$home_block->route}}" class="px-10 py-3 bg-[#222] rounded-full text-white font-medium mb-4 relative overflow-hidden group inline-block"><span class="absolute top-0 w-full h-full bg-[#d79290] z-0 -left-full group-hover:left-0 transition-all duration-300"></span> <span class="relative z-10">View All</span></a>

                @if($key == 0)
                <h2 class="relative text-2xl mt-12 mb-10"><span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span> <span class="text-black">Featured Categories</span> <span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span></h2>

                <div class="grid grid-cols-4 gap-7">
                    @foreach ($categories as $c_key => $category)
                        @if($c_key > 3 && $c_key < 7)
                            <a href="{{$category->route}}" class="relative overflow-hidden group h-full {{$c_key == 5 ? 'col-span-2' : ''}}">
                                <img src="{{$category->img_paths['original']}}" class="w-full group-hover:scale-110 transition duration-1000 h-full object-cover" alt="{{$category->title}}">
        
                                <div class="absolute left-0 bottom-4 w-full">
                                    <span class="bg-white px-4 py-2.5 inline-block text-sm font-semibold hover:bg-[#222] hover:text-white t transition duration-300">{{$category->title}}</span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                @endif

                @if($key == 1)
                <div class="grid grid-cols-2 gap-6 mt-8 mb-8">
                    @foreach ($categories as $c_key => $category)
                    @if($c_key > 6 && $c_key < 11)
                    <a href="{{$category->route}}" class="relative block">
                        <img src="{{$category->img_paths['original']}}" class="w-full" alt="{{$category->title}}">
    
                        <div class="absolute left-0 top-0 w-full h-full flex items-center justify-center text-5xl">
                            <span class="font-shadow">{{$category->title}}</span>
                        </div>
                    </a>
                    @endif
                    @endforeach
                </div>

                <h2 class="relative text-2xl mt-12 mb-10"><span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span> <span class="text-black">Featured Categories</span> <span class="w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span></h2>

                <div class="grid grid-cols-4 gap-7">
                    @foreach ($categories as $c_key => $category)
                        @if($c_key > 10 && $c_key < 15)
                            <a href="{{$category->route}}" class="relative overflow-hidden group">
                                <img src="{{$category->img_paths['medium']}}" alt="{{$category->title}}">
        
                                <div class="absolute left-0 bottom-4 w-full">
                                    <span class="bg-white px-4 py-2.5 inline-block text-sm font-semibold hover:bg-[#222] hover:text-white t transition duration-300">{{$category->title}}</span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('front/OwlCarousel/dist/owl.carousel.min.js')}}"></script>

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
                    items: 4,
                    margin: 20,
                },
                1000: {
                    items: 5,
                    margin: 30,
                }
            },
            lazyLoad: false
        });
    </script>
@endsection
