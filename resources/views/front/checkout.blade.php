@extends('front.layouts.master')

@section('head')
@include('meta::manager', [
    'title' => 'Checkout - ' . ($settings_g['title'] ?? ''),
])
@endsection

@section('master')
<div class="max-w-[1400px] mx-auto p-3">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
            <h3 class="my-3 text-xl font-bold">Order Summary</h3>
            <div class="space-y-6">
                <!-- product cart -->
                <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                    <a href="#" class="shrink-0 md:order-1">
                        <img class="h-20 w-20" src="https://png.pngtree.com/png-clipart/20221001/ourmid/pngtree-fast-food-big-ham-burger-png-image_6244235.png" alt="imac image" />
                    </a>

                    <label for="counter-input" class="sr-only">Choose quantity:</label>
                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                        <div class="flex items-center">
                        
                        <h4>
                            <span>x</span>
                            <span>2</span>
                        </h4>
                        
                        </div>
                        <div class="text-end md:order-4 md:w-32">
                        <p class="text-base font-bold text-gray-900">$1,499</p>
                        </div>
                    </div>

                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                        <a href="#" class="text-lg text-gray-900 hover:underline font-semibold">Healthy Burger | good for health</a>
                        <p class="text-xs uppercase text-orange-500">Category name</p>
                        <div class="flex items-center gap-4">
                        
                        
                        </div>
                    </div>
                    </div>
                </div>
                <!-- product cart end -->
            </div>

            
        </div>

        <div>
            <h3 class="my-3 text-xl font-bold">Shipping Details:</h3>
            <div>
                <form action="#" class="p-3 border rounded-lg flex flex-col gap-4">
                    <div class="flex flex-col">
                        <label for="" class="ml-4 text-neutral-500 text-xs">
                            Full Name
                        </label>
                        <input type="text" name="name" required class="px-5 py-2 rounded-full outline-none border focus:border-black focus:shadow-lg transition-all" placeholder="Enter your full name">
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="ml-4 text-neutral-500 text-xs">
                            Phone Number
                        </label>
                        <input type="text" name="number" required class="px-5 py-2 rounded-full outline-none border focus:border-black focus:shadow-lg transition-all" placeholder="Enter your phone number">
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="ml-4 text-neutral-500 text-xs">
                            Address
                        </label>
                        <input type="text" name="address" required class="px-5 py-2 rounded-full outline-none border focus:border-black focus:shadow-lg transition-all" placeholder="Enter your address">
                    </div>
                    <!-- <div class="flex flex-col">
                        <label for="" class="ml-4 text-neutral-500 text-xs">
                            Email
                        </label>
                        <input type="text" name="email" required class="px-5 py-2 rounded-full outline-none border focus:border-black focus:shadow-lg transition-all" placeholder="Enter your email">
                    </div> -->
                    <!-- <div class="flex flex-col">
                        <label for="" class="ml-4 text-neutral-500 text-xs">
                            Note
                        </label>
                        <input type="text" name="email" required class="px-5 py-2 rounded-[25px] outline-none border focus:border-black focus:shadow-lg transition-all h-20" placeholder="Enter a Note">
                    </div> -->
                </form>
                <div class="flex">
                    <div class="my-4 p-2 flex items-center gap-2 border rounded-lg">
                        <div class="h-4 w-4 rounded-full bg-neutral-300 flex items-center justify-center">
                            <div class="h-3 w-3 rounded-full bg-slate-500"></div>
                        </div>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                            </svg>
                        </span>
                        <p>Cash on Delivery</p>
                    </div>
                </div>
                
                <div class="max-w-sm my-5">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select your Area</label>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="insidedhaka">Inside Dhaka</option>
                        <option value="outsidedhaka">Outside Dhaka</option>
                    </select>
                </div>


                <!-- Order summary  -->
            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
                        <p class="text-xl font-semibold text-gray-900">Order summary</p>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Original price</dt>
                                    <dd class="text-base font-medium text-gray-900">$3000</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Savings</dt>
                                    <dd class="text-base font-medium text-green-600">-$299</dd>
                                </dl>

                                

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Delivery Charge</dt>
                                    <dd class="text-base font-medium text-gray-900">$100</dd>
                                </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 ">
                                <dt class="text-base font-bold text-gray-900">Total</dt>
                                <dd class="text-base font-bold text-gray-900">$3100</dd>
                                </dl>
                            </div>

                            <button class="relative inline-flex items-center px-12 py-2 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                                <span class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                                <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                                <span class="relative">Place Order</span>
                            </button>

                            
                        </div>
                    </div>
                    <!-- Order summary end  -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@endsection
