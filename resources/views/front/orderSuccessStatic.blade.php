@extends('front.layouts.master')

@section('head')
@include('meta::manager', [
    'title' => 'Thankyou - ' . ($settings_g['title'] ?? ''),
])
@endsection

@section('master')
<div class="p-3 py-5">
    <div class="max-w-[1500px] mx-auto">
        <div class="flex flex-col items-center justify-center">
            <img src="https://cdn.dribbble.com/users/147386/screenshots/5315437/success-tick-dribbble.gif" alt="Order success" class="max-w-[400px]">
            <h3 class="text-2xl md:text-5xl font-semibold">Thank's for your Order!</h3>
            <h4 class="my-3 text-green-600 text-xl">Your orde has been placed.</h4>

            <div class="flex items-center justify-center gap-2 mt-10">
                <a href="/" class="relative rounded px-5 py-2.5 overflow-hidden group bg-green-500 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-green-400 transition-all ease-out duration-300">
                    <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                    <span class="relative">Back to Home</span>
                </a>
                <a href="/search?search=" class="px-5 py-2 hover:underline transition-all flex items-center gap-2">
                    Continue Shopping 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>

                </a>
            </div>
        </div>



        <div>
            <div class="my-5 mt-20">
                <h1 class="text-xl font-semibold">Suggested for you</h1>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-1">
                <!-- card -->
                <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                    <a href="#">
                        <img class="max-w-[200px] w-[150px] md:w-full mx-auto" src="https://png.pngtree.com/png-clipart/20230526/ourmid/pngtree-vegetables-and-fruits-in-a-basket-made-with-generative-ai-png-image_7110313.png" alt="Product Name" />
                    </a>
                    <div class="p-3">
                        <div class="flex items-baseline">
                        <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                        <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                            <h4>babyFood</h4>
                        </div>
                        </div>
                        <h2 class="mt-2 font-semibold leading-tight truncate">
                            <a href="#" class="hover:underline">
                                Healthy Food for Health Lorem ipsum dolor sit amet.
                            </a>
                        </h2>

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
                                <span class="mt-1 group-hover:text-green-700 hidden xl:block text-sm">Add to Bag</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                <!-- card -->
                <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                    <a href="#">
                        <img class="max-w-[200px] w-[150px] md:w-full mx-auto" src="https://png.pngtree.com/png-clipart/20230526/ourmid/pngtree-vegetables-and-fruits-in-a-basket-made-with-generative-ai-png-image_7110313.png" alt="Product Name" />
                    </a>
                    <div class="p-3">
                        <div class="flex items-baseline">
                        <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                        <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                            <h4>babyFood</h4>
                        </div>
                        </div>
                        <h2 class="mt-2 font-semibold leading-tight truncate">
                            <a href="#" class="hover:underline">
                                Healthy Food for Health Lorem ipsum dolor sit amet.
                            </a>
                        </h2>

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
                                <span class="mt-1 group-hover:text-green-700 hidden xl:block text-sm">Add to Bag</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                <!-- card -->
                <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                    <a href="#">
                        <img class="max-w-[200px] w-[150px] md:w-full mx-auto" src="https://png.pngtree.com/png-clipart/20230526/ourmid/pngtree-vegetables-and-fruits-in-a-basket-made-with-generative-ai-png-image_7110313.png" alt="Product Name" />
                    </a>
                    <div class="p-3">
                        <div class="flex items-baseline">
                        <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                        <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                            <h4>babyFood</h4>
                        </div>
                        </div>
                        <h2 class="mt-2 font-semibold leading-tight truncate">
                            <a href="#" class="hover:underline">
                                Healthy Food for Health Lorem ipsum dolor sit amet.
                            </a>
                        </h2>

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
                                <span class="mt-1 group-hover:text-green-700 hidden xl:block text-sm">Add to Bag</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@endsection
