@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => ($settings_g['title'] ?? env('APP_NAME')) . ' - ' . ($settings_g['slogan'] ?? env('APP_NAME')),
        'description' => $settings_g['meta_description'] ?? '',
        'keywords' => $settings_g['keywords'] ?? '',
    ])
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
        <h2 class="bg-primary py-1 px-2 font-semibold rounded text-white mb-3">প্রোডাক্ট ক্যাটেগরীজ</h2>
        <ul class="mb-8">
            @foreach ($categories as $category)
                <li class="inline-block"><a href="{{ $category->route }}"
                        class="inline-block bg-orange-100 py-1 px-2 rounded border border-gray-400 text-gray-600 text-xs font-semibold hover:bg-primary hover:text-white product_category_item">{{ $category->title }}</a>
                </li>
            @endforeach
        </ul>

        <div class="bg-orange-100 px-2 py-3 mb-8">
            <div class="grid grid-cols-2 gap-2 mb-6">
                <img src="{{ asset('img/hot-deal-logo.gif') }}" class="max-w-full w-24" alt="hot deal">

                <div class="text-right">
                    <a href="{{ route('allHotDeals') }}" class="inline-block font-semibold hover:underline text-red-600">
                        সকল হট ডিল
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                @foreach ($hot_deals as $hot_deal)
                    <a href="{{ $hot_deal->route }}" class="block border border-red-600 relative">
                        <img class="w-full h-auto" width="140" height="140" src="{{ $hot_deal->img_paths['small'] }}"
                            alt="{{ $hot_deal->title }}">

                        <div class="absolute top-2 right-2">
                            <img src="{{ asset('img/flash-deal-percentage.png') }}" alt="flash-deal-percentage">
                            <div
                                class="absolute top-0 right-0 w-full text-center mt-2 text-white font-bold text-xs leading-3">
                                <span>{{ $hot_deal->discount_percentage }}%</span>
                                <span>ছাড়</span>
                            </div>
                        </div>

                        <span
                            class="absolute right-0 bottom-3 bg-primary text-white px-3 rounded-l-full text-sm md:text-lg font-bold">৳
                            {{ $hot_deal->sale_price }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <h2 class="bg-primary py-1 px-2 font-semibold rounded text-white mb-4">প্রয়োজনীয় প্রোডাক্ট</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 mb-3">
            @foreach ($products as $product)
                @include('front.layouts.product-loop')
            @endforeach
        </div>

        <div class="my-6">
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
