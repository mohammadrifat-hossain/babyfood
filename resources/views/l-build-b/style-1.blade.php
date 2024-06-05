<!-- section1 -->
<section class="bg-[#b5005c]">
    <div class="container py-20">
        <div class="text-center py-2">
            <h1 class="text-white text-[30px] sm:text-[50px] my-10 font-bold leading-10">
                {{$product->title}}
            </h1>
            <h2 class="text-[20px] leading-6 sm:text-[25px] my-5 mt-14 py-2 font-bold text-white">
                ১ পিস {{$product->regular_price}}/- টাকা, অফার মূল্য {{$product->sale_price}}/- টাকা মাত্র!
            </h2>
            <div class="px-2">
                <button
                    data-scroll-nav="2"
                    class="py-2 px-8 my-5 sm:px-12 bg-[#FF0000] text-white text-center font-semibold sm:text-[30px] text-[20px] leading-5 sm:leading-normal rounded-full">
                    অর্ডার করতে বাটনে ক্লিক করুন
                </button>
                @if(isset($landing->others['mobile_number']) && $landing->others['mobile_number'])
                <h2 class="text-[17px] sm:text-[22px] font-semibold text-white px-2 py-5">
                    বিশেষ প্রয়োজনে কল করুনঃ {{$landing->others['mobile_number'] ?? ''}}
                </h2>
                @endif

                @if(isset($landing->others['vide_embed_code']) && $landing->others['vide_embed_code'])
                <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                    {!! $landing->others['vide_embed_code'] !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- section2 -->
<section class="bg-[#6a2c7c]">
    <div class="py-10">
        <div class="px-4">
            <div class="owl-carousel_custom owl-carousel owl-theme mb-5">
                <div>
                    <img src="{{$product->img_paths['original'] ?? asset('img/default-img.png')}}" class="w-full bg-gray-100" alt="{{$product->title}}">
                </div>

                @foreach ($product->Gallery as $gallery)
                    <div>
                        <img src="{{$gallery->paths['original'] ?? asset('img/default-img.png')}}" class="w-full bg-gray-100" alt="{{$product->title}}">
                    </div>
                @endforeach
            </div>
        </div>

        <h1 class="text-center text-white font-bold text-[16px] py-10 sm:text-[40px] leading-6 sm:leading-[65px]">
            {{$product->short_description ?? 'Product Short Description'}}
        </h1>
    </div>
</section>
<!-- section3 -->
<section class="bg-black py-10">
    <div class="container">
        <h1 class="text-white text-[22px] sm:text-[45px] text-center my-10 font-bold leading-10">
            {{$product->title}} কেন কিনবেন?
        </h1>
        <div class="dynamic_style text-white">
            {!! $landing->others['description'] ?? '' !!}
        </div>
    </div>
</section>
<!-- section4 -->
<section class="bg-[#286acb]">
    <div class="py-7">
        <div class="container py-4">
            <h1 class="text-center text-[40px] font-semibold text-white">
                ২ টি গুরুত্বপূর্ন বিষয়ঃ
            </h1>
            <h1 class="px-3 py-1 text-center text-white text-[20px] font-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="text-white">পন্য হাতে পেয়ে প্যকেট খুলে চেক করে মুল্য পরিশোধ করবেন।
                </span>
            </h1>
            <h1 class="px-3 py-1 text-center text-white text-[20px] font-normal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="text-white">অর্ডার করার পরে আমাদের কল সেন্টার থেকে ফোন করে পন্যের কালার ও
                    সাইজ কনফার্ম করা হবে।
                </span>
            </h1>
            <div class="text-center py-10">
                <button
                    data-scroll-nav="2"
                    class="py-2 px-8 my-5 sm:px-12 bg-[#FF0000] text-white text-center font-semibold sm:text-[30px] text-[20px] rounded-full leading-5 sm:leading-normal">
                    সঠিক তথ্য দিয়ে নিচের ফর্মটি পূরণ করুনঃ </button>
                @if(isset($landing->others['mobile_number']) && $landing->others['mobile_number'])
                <h2 class="text-[17px] sm:text-[22px] font-semibold text-black px-2 py-5">
                    বিশেষ প্রয়োজনে কল করুনঃ {{$landing->others['mobile_number']}}
                </h2>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="container">
    @include('landing.layouts.order-form', ['order_type' => 'builder'])
</div>
