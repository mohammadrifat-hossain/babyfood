<div>
    <div class="relative overflow-hidden group">
        <div class="group-hover:scale-110 transition duration-1000">
            <a href="{{$product->route}}" class="block group-hover:hidden h-full">
                <img src="{{$product->img_paths['original']}}" class="w-full h-full object-cover" alt="{{$product->title}}">
            </a>

            @if(count($product->Gallery))
            <a href="{{$product->route}}" class="hidden group-hover:block h-full">
                <img src="{{$product->Gallery[0]->paths['original']}}" class="w-full h-full object-cover" alt="{{$product->title}}">
            </a>
            @else
            <a href="{{$product->route}}" class="hidden group-hover:block h-full">
                <img src="{{$product->img_paths['original']}}" class="w-full h-full object-cover" alt="{{$product->title}}">
            </a>
            @endif
        </div>

        <div class="absolute left-0 top-0 w-full h-full flex justify-center content-center items-center">
            <div class="-mt-16 group-hover:mt-0 transition-all duration-300 opacity-0 group-hover:opacity-100 invisible group-hover:visible">
                <a href="{{$product->route}}" class="bg-white px-6 py-2 rounded-full font-[300] text-center h-10 overflow-hidden button-group hover:bg-[#222] hover:text-white inline-block">
                    <span class="relative block top-[0] button-group-hover:-top-[30px] transition-all duration-300">View Details</span>

                    <span class="inline-block relative top-[10px] button-group-hover:top-[-25px] transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </span>
                </a>
                <br>
                <a href="{{route('cart.directOrder', ['product' => $product->id])}}" class="bg-white px-6 py-2 rounded-full text-center h-10 overflow-hidden button-group hover:bg-[#222] hover:text-white font-[300] inline-block">
                    <span class="relative block top-[0] button-group-hover:-top-[30px] transition-all duration-300">Quick Shop</span>

                    <span class="inline-block relative top-[10px] button-group-hover:top-[-25px] transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <p class="mt-2 text-[#222]"><a href="{{$product->route}}">{{$product->title}}</a></p>
    <p class="text-[#696969] font-[400] text-lg"><a href="{{$product->route}}">Tk {{amount($product->sale_price)}}</a></p>
</div>
