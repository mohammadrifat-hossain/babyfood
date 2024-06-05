<div class="bg-white overflow-hidden border">
    <a href="{{$product->route}}" class="relative block group">
        <img src="{{$product->img_paths['small']}}" alt="{{$product->title}}" width="140" height="140" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
            <div class="text-white text-lg w-9 h-9 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg>
            </div>
        </div>
    </a>

    <div class="pt-2 pb-1 px-2">
        <a href="{{$product->route}}">
        <h4 class="font-medium text-md mb-2 text-gray-800 hover:text-primary transition h-12 overflow-hidden">{{$product->title}}</h4>
        </a>

        <div class="flex items-baseline space-x-2">
        <p class="text-md text-primary font-semibold">{{$product->sale_price}} tk</p>
        @if($product->regular_price)
        <p class="text-sm text-gray-400 line-through">{{$product->regular_price}} tk</p>
        @endif
        </div>
    </div>

    <a href="{{route('cart.directOrder', ['product' => $product->id])}}" class="block w-full py-1 text-center text-white bg-primary border-2 border-primary hover:bg-transparent hover:text-primary transition focus:outline-none">অর্ডার করুন</a>
</div>
