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

    <div class="flex items-center flex-col md:flex-row gap-5 justify-between">
        <div class="flex items-center justify-center md:w-[70%] p-4">
            <div class="flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <p class="">Fast Food</p>
                    <img src="https://www.pikpng.com/pngl/b/51-510664_chef-hat-clipart-black-and-white-vector-chef.png" alt="Hat" class="w-[50px]" />
                </div>
                <h2 class="text-5xl font-semibold">Fresh & Healthy Food</h2>
                <a href="/search?search=" class="px-5 py-2 rounded-full border hover:shadow-lg transition-all flex justify-center items-center gap-1">Shop Now <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
                </a>
            </div>
        </div>
        <div class="bg-indigo-600 w-[40%]">
            <img src="https://png.pngtree.com/png-clipart/20221001/ourmid/pngtree-fast-food-big-ham-burger-png-image_6244235.png" alt="Banner Photo" class="w-[400px] md:-ml-[200px] pointer-events-none"/>
        </div>
    </div>

    
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
        <div class="grid-cols-4 gap-4 hidden md:grid">
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
            <h2 class="relative text-2xl mt-12 mb-10"><span class="w-6 md:w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span> <span class="text-black">Featured Categories</span> <span class="w-6 md:w-16 h-0.5 bg-[#222222] inline-block mb-1.5"></span></h2>

            <!-- TODO: loop through this list with actual categories -->
            <div class="flex flex-wrap gap-5 items-center justify-center">
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Fruits & Vegetables</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/2153/2153786.png" alt="Fruits & Vegetables" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Meat & Seafood</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/7471/7471961.png" alt="Meat & Seafood" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Dairy & Eggs</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/2437/2437740.png" alt="Dairy & Eggs" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Bakery</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/3081/3081967.png" alt="Bakery" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Snacks & Sweets</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/3814/3814614.png" alt="Snacks & Sweets" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Beverages</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/3859/3859737.png" alt="Beverages" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Pantry Staples</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/12240/12240680.png" alt="Pantry Staples" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Frozen Foods</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/5029/5029236.png" alt="Frozen Foods" class="h-[50px]">
                </div>
                <div class="category p-4 border rounded-lg flex flex-col gap-3 items-center">
                    <h3>Health Foods</h3>
                    <img src="https://cdn-icons-png.flaticon.com/128/561/561611.png" alt="Organic & Health Foods" class="h-[50px]">
                </div>
                
            </div>
        </div>



        <!-- product lists -->
        <div class="mt-10 p-3 border-t">
            <h2 class="text-2xl font-bold flex items-center justify-between">Fresh Deals: The best of the week for less 
                <a href="/search?search=" class="relative inline-block px-4 py-2 font-medium group text-base">
                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white transition-all">View More</span>
                </a>
            </h2>
            <div class="mt-8">
                <p class="max-w-[600px] text-neutral-500 text-sm">Discover unbeatable savings with Fresh Deals! Every week, we bring you the best offers on a wide range of products, from electronics and home essentials to fashion and beauty. Shop top-quality items at discounted prices and enjoy incredible value for your money.</p>
            </div>
            <div class="mt-5">
                <!-- carousel here -->
                 <!-- card start -->
                 <div class="owl-carousel owl-carousel_normal">
                            <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                                <a href="#">
                                    <img class="max-w-[200px] mx-auto" src="https://png.pngtree.com/png-clipart/20221001/ourmid/pngtree-fast-food-big-ham-burger-png-image_6244235.png" alt="Product Name" />
                                </a>
                                <div class="p-3 md:p-6">
                                    <div class="flex items-baseline">
                                    <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                                    <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                        <h4>babyFood</h4>
                                    </div>
                                    </div>
                                    <h2 class="mt-2 font-semibold leading-tight truncate text-xl">
                                        <a href="#" class="hover:underline transition-all">Healthy Burger for your health</a>
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
                                        <div class="cursor-pointer flex items-center justify-center gap-1 group xl:border xl:px-2 xl:py-1 xl:rounded-full">
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
            <!-- carousel to here -->
        </div>











        <div class="flex items-center md:items-start justify-center md:justify-between flex-col md:flex-row gap-5 mt-10">
            <div class="p-3 border-t w-full">
                <h2 class="text-3xl font-bold flex items-center justify-between">Fresh Vegitables
                    <a href="/search?search=" class="relative inline-block px-4 py-2 font-medium group text-base">
                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                        <span class="relative text-black group-hover:text-white transition-all">View More</span>
                    </a>
                </h2>
                <div class="mt-8">
                    <p class="max-w-[600px] text-neutral-500">Take a look at these popular things that are gaining a lot of attention, ranging from regular customer favorites to exclusive items that are hard to obtain elsewhere!</p>
                </div>
                <div class="mt-5">
                    <div>
                        
                        <!-- card start -->
                        <div class="owl-carousel owl-carousel_normal">
                            <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                                <a href="#" class="hover:underline transition-all">
                                    <img class="max-w-[200px] mx-auto" src="https://png.pngtree.com/png-clipart/20230526/ourmid/pngtree-vegetables-and-fruits-in-a-basket-made-with-generative-ai-png-image_7110313.png" alt="Product Name" />
                                </a>
                                <div class="p-3 md:p-6">
                                    <div class="flex items-baseline">
                                    <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                                    <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                        <h4>babyFood</h4>
                                    </div>
                                    </div>
                                    <h2 class="mt-2 font-semibold leading-tight truncate text-xl">
                                        <a href="#" class="hover:underline transition-all">Healthy Burger for your health</a>
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









        <div class="mt-10 p-3 border-t">
            <h2 class="text-2xl font-bold flex items-center justify-between">Baby Foods 
                <a href="/search?search=" class="relative inline-block px-4 py-2 font-medium group text-base">
                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white transition-all">View More</span>
                </a>
            </h2>
            <div class="mt-8">
                <p class="max-w-[600px] text-neutral-500">Give your baby the best start with our range of nutritious baby food. Made with high-quality, natural ingredients, our baby food is designed to support your child's growth and development.</p>
            </div>

            <div class="mt-5">
                <!-- card start -->
                <div class="owl-carousel owl-carousel_normal">
                            <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                                <a href="#" class="hover:underline transition-all">
                                    <img class="max-w-[200px] mx-auto" src="https://www.nicepng.com/png/detail/951-9516652_nestle-cerelac-mixed-fruit-and-wheat-with-milk.png" alt="Product Name" />
                                </a>
                                <div class="p-3 md:p-6">
                                    <div class="flex items-baseline">
                                    <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                                    <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                        <h4>babyFood</h4>
                                    </div>
                                    </div>
                                    <h2 class="mt-2 font-semibold leading-tight truncate text-xl">
                                        <a href="#" class="hover:underline transition-all">Healthy Burger for your health</a>
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
                                            <span class="mt-1 group-hover:text-green-700 hidden xl:block">Add to Cart</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card end -->
            </div>
        </div>

        <!-- start -->
        <div class="bg-white  h-full py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                

                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
                    <!-- image - start -->
                    <a href="#"
                        class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                        <img src="https://media-cldnry.s-nbcnews.com/image/upload/t_nbcnews-fp-1024-512,f_auto,q_auto:best/rockcms/2021-12/211213-wee-groceries-se-405p-a36212.jpg" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110 brightness-50 group-hover:brightness-100" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>

                        <div class="flex flex-col">
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-xl font-bold">Grocery</span>
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-sm">Fresh & Healthy to your home</span>
                        </div>
                    </a>
                    <!-- image - end -->

                    <!-- image - start -->
                    <a href="#"
                        class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                        <img src="https://miro.medium.com/v2/resize:fit:1107/1*kQ5xXaLUK3S8EwnU4-zCxg.png" loading="lazy" alt="Photo by Magicle" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110 brightness-50 group-hover:brightness-100" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>

                        <div class="flex flex-col">
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-xl font-bold">Baby Food</span>
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-sm">Get 100% authentic Baby Products</span>
                        </div>
                    </a>
                    <!-- image - end -->

                    <!-- image - start -->
                    <a href="#"
                        class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                        <img src="https://hips.hearstapps.com/hmg-prod/images/groceries-shopping-royalty-free-image-1569525319.jpg?crop=1xw:0.84415xh;center,top" loading="lazy" alt="Photo by Martin Sanchez" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110 brightness-50 group-hover:brightness-100" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>

                        <div class="flex flex-col">
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-xl font-bold">Healthy Food For Women</span>
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-sm">For your fitness and health</span>
                        </div>
                    </a>
                    <!-- image - end -->

                    <!-- image - start -->
                    <a href="#"
                        class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                        <img src="https://st4.depositphotos.com/4233795/30234/i/450/depositphotos_302342282-stock-photo-delivery-woman-in-blue-uniform.jpg" loading="lazy" alt="Photo by Lorenzo Herrera" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110 brightness-50 group-hover:brightness-100" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>

                        <div class="flex flex-col">
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-xl font-bold">Home Delivery</span>
                            <span class="relative ml-4 mb-3 inline-block  text-white md:ml-5 text-sm">Fast delivery to your home</span>
                        </div>
                    </a>
                    <!-- image - end -->
                </div>
            </div>
        </div>
        <!-- end -->
        

        


        <div class="mt-10 p-3 border-t">
            <h2 class="text-2xl font-bold flex items-center justify-between">Chocolates & Cereal
                <a href="/search?search=" class="relative inline-block px-4 py-2 font-medium group text-base">
                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white transition-all">View More</span>
                </a>
            </h2>
            <div class="mt-8">
                <h4 class="max-w-[600px] text-neutral-500">Indulge in the rich, velvety flavors of premium chocolates, crafted to perfection for those who appreciate the finer things in life. From dark, milk, and white chocolates to gourmet truffles and pralines, our selection caters to every chocolate lover's craving.</h4>
            </div>

            <div class="mt-5">
                <!-- card start -->
                <div class="owl-carousel owl-carousel_normal">
                            <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                                <a href="#" class="hover:underline transition-all">
                                    <img class="max-w-[200px] mx-auto" src="https://www.premierproteincereal.com/wp-content/uploads/2022/01/Premier-Protein-Chocolate-Almond-Cereal.png" alt="Product Name" />
                                </a>
                                <div class="p-3 md:p-6">
                                    <div class="flex items-baseline">
                                    <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                                    <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                        <h4>babyFood</h4>
                                    </div>
                                    </div>
                                    <h2 class="mt-2 font-semibold leading-tight truncate text-xl">
                                        <a href="#" class="hover:underline transition-all">Healthy Burger for your health</a>
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
                                            <span class="mt-1 group-hover:text-green-700 hidden xl:block">Add to Cart</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- card end -->
            </div>
        </div>





        <div class="mt-10 p-3 border-t">
            <h2 class="text-2xl font-bold flex items-center justify-between">Womens Cosmetics 
                <a href="/search?search=" class="relative inline-block px-4 py-2 font-medium group text-base">
                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white transition-all">View More</span>
                </a>
            </h2>
            <div class="mt-8">
                <h4 class="max-w-[600px] text-neutral-500">Elevate your beauty routine with our premium range of women's cosmetics. From flawless foundations and vibrant eyeshadows to long-lasting lipsticks and nourishing skincare, we offer everything you need to create stunning looks for any occasion.</h4>
            </div>

            <div class="mt-5">
                <!-- card start -->
                <div class="owl-carousel owl-carousel_normal">
                            <div class="bg-white rounded-lg overflow-hidden border shadow-sm ">
                                <a href="#">
                                    <img class="max-w-[200px] mx-auto" src="https://img.freepik.com/free-vector/bag-with-cosmetics-realistic-composition-with-isolated-image-open-vanity-case-with-brushes-lipstick-illustration_1284-57081.jpg" alt="Product Name" />
                                </a>
                                <div class="p-3 md:p-6">
                                    <div class="flex items-baseline">
                                    <span class="inline-block bg-teal-200 text-teal-800 py-1 px-2 md:px-4 text-xs rounded-full uppercase font-semibold ">New</span>
                                    <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                        <h4>babyFood</h4>
                                    </div>
                                    </div>
                                    <h2 class="mt-2 font-semibold leading-tight truncate text-xl">
                                        <a href="#" class="hover:underline transition-all">Healthy Burger for your health</a>
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
                                            <span class="mt-1 group-hover:text-green-700 hidden xl:block">Add to Cart</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card end -->
            </div>
        </div>






        <div class="flex flex-col md:flex-row items-center justify-center mt-6">
            <div class="flex flex-col gap-4 my-20 max-w-[600px]">
                <h3 class="text-5xl">Stay Home and get your daily needs <br/>from your Home</h3>
                <p>Start your daily shopping from us.</p>
                <div>
                    <input type="text" class="px-4 py-2 rounded-full bg-white border outline-none focus:shadow-lg transition-all" placeholder="Enter your email">
                    <button class="px-4 py-2 rounded-full bg-green-700 text-white hover:bg-green-800 transition-all">Subscribe</button>
                </div>
            </div>
            <div>
                <img src="https://static.vecteezy.com/system/resources/previews/001/212/826/non_2x/online-delivery-contactless-service-to-home-design-vector.jpg" alt="Home delivery man" class="max-w-[700px] w-full">
            </div>
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
                    // margin: 10,
                },
                400: {
                    items: 2,
                    // margin: 10,
                },
                600: {
                    items: 3,
                    // margin: 20,
                },
                1000: {
                    items: 4,
                    // margin: 30,
                },
                1400: {
                    items: 5,
                    // margin: 30,
                },
            },
            lazyLoad: false
        });
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
@endsection
