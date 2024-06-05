<div class="mt-6 border-primary border-2 p-3 rounded" data-scroll-index="2">
    <h2 class="text-2xl md:text-4xl bg-yellow-300 text-center py-2 font-bold px-1 mb-3">অর্ডার করতে নিচের ফর্মটি সম্পূর্ণ পূরন করুন</h2>
    <form action="{{(($order_type ?? 'normal') == 'builder') ? route('landing.builderOrder', $landing->id) : route('landing.order', $product->id)}}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-10 checkoutForm">
       @csrf
       <input type="hidden" name="uu_id" class="uu_id" value="{{\Str::uuid()}}">

       <div>
          <div class="mb-4">
             <label class="block text-text_color text-sm font-bold mb-2">আপনার নাম *</label>
             <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline shipping_name information_field @error('name') border-red-500 @enderror" type="text" name="name" value="{{old('name')}}" placeholder="আপনার নাম *" required="">

             @error('name')
                 <span class="invalid-feedback block text-red-5" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">ফোন নম্বর*</label>
            <div class="grid grid-cols-5 gap-4">
               <div class="col-span-1 text-right pt-2">
                  +88
               </div>
               <input type="number" placeholder="ফোন নম্বর" name="mobile_number" value="{{old('mobile_number')}}" required="required" class="col-span-4 shadow appearance-none shipping_mobile_number information_field border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mobile_number @error('mobile_number') border-red-500 @enderror">
            </div>

            @error('mobile_number')
                <span class="invalid-feedback block text-red-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>
          <div class="mb-4">
             <label class="block text-text_color text-sm font-bold mb-2">বাসা/রোড নাম্বার, এলাকার নাম, থানা নাম *</label>
             <input class="shadow appearance-none border rounded w-full shipping_address information_field py-2 px-3 text-gray-700 leading-tight focus:shadow-outline @error('address') border-red-500 @enderror" type="text" name="address" value="{{old('address')}}" placeholder="বাসা/রোড নাম্বার, এলাকার নাম, থানা নাম *" required="">

             @error('address')
                 <span class="invalid-feedback block text-red-5" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
          </div>
          {{-- <div class="mb-4">
             <label class="block text-text_color text-sm font-bold mb-2">আপনার জেলা সিলেক্ট করুন*</label>
             <select name="state" class="form-control select_state w-full shipping_state information_field @error('state') border-red-500 @enderror" id="state" required>
                <option selected disabled>জেলা সিলেক্ট করুন</option>
                @foreach ($states as $state)
                    <option value="{{$state['name']}}">{{$state['name']}}</option>
                @endforeach
            </select>

            @error('state')
                <span class="invalid-feedback block text-red-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div> --}}

          {{-- @if(request()->getHost() == 'ladies.jacketbd.com')
          <div class="mb-4">
             <label class="block text-text_color text-sm font-bold mb-2">আপনার সাইজের বিবরণ লিখুন</label>

             <textarea name="note" class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline border-green-800 border-2" cols="30" rows="5"></textarea>
          </div>
          @endif --}}


          @if($product->type == 'Variable')
          <div class="mb-4">
              <label class="block text-text_color text-sm mb-2">আপনার ভেরিয়েশন সিলেক্ট করুন <span class="text-red-700">*</span></label>

              @foreach ($product->VariableProductData as $product_data)
                  <label for="variation_{{$product_data['id']}}"><input type="radio" {{$loop->index == 0 ? 'checked' : ""}} name="variation[]" value="{{$product_data['id']}}" data-productid="{{$product_data['product_id']}}" data-price="{{$product_data['sale_price']}}" data-oprice="{{$product_data['regular_price']}}" data-variation="{{$product_data['attribute_items_string']}}" data-image="{{$product->img_paths['large'] ?? ''}}" class="select_product product_variation product_variations" id="variation_{{$product_data['id']}}"> {{$product_data['attribute_items_string'] ?? ''}}</label>
                  <br>
              @endforeach
          </div>
          @endif

          <div class="mt-6 md:hidden">
            <button type="submit" class="text-center rounded-md border-2 bg-green-800 border-green-800 px-6 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 block w-full">Order Now</button>
         </div>
       </div>
       <div>
          <div class="py-2 md-py-6">
              <div class="flow-root">
                 <ul role="list" class="-my-6 divide-y divide-gray-200 listed_items">
                    <li class="flex py-6 default_item">
                       <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                          <img src="{{$product->img_paths['small']}}" alt="{{$product->title}}" class="h-full w-full object-cover object-center">
                       </div>
                       <div class="ml-4 flex flex-1 flex-col">
                          <div>
                             <div class="flex justify-between text-base font-medium">
                                <h3>
                                   {{$product->title}}

                                    <input type="hidden" name="meta[]" value="">
                                    <input type="hidden" class="selected_price" value="{{$product->sale_price}}">
                                    <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                    @if($product->type == 'Variable')
                                    {{-- <input type="hidden" name="variation[]" value="{{$product->VariableProductData[0]->id}}"> --}}
                                    @else
                                    <input type="hidden" name="variation[]" value="{{$product->ProductData->id}}">
                                    @endif
                                </h3>
                                <p class="ml-4"><span class="product_price">{{$product->sale_price}}</span> টাকা</p>
                             </div>
                          </div>
                          {{-- <div class="flex flex-1 items-end justify-between text-sm">
                             <p>Qty: 1</p>
                          </div> --}}
                          <div class="flex flex-1 items-end justify-between text-sm">
                            <div class="flex">
                                <button class="w-6 h-6 text-center border-2 border-red-500 cursor-pointer font-bold border-l-0 bg-red-500 text-white qty_btn" data-type="minus" type="button">-</button>
                                <input type="number" class="h-6 border-2 border-red-500 px-1 w-10 focus:outline-none text-center selected_qty" name="quantity[]" value="1" readonly>
                                <button class="w-6 h-6 text-center border-2 border-red-500 cursor-pointer font-bold border-r-0 bg-red-500 text-white qty_btn" data-type="plus" type="button">+</button>
                            </div>

                            <div class="flex">
                               <button type="button" class="font-medium text-red-400 hover:text-red-500 removeItem" onclick="return confirm('Are you sure to remove?');">
                                  <svg data-v-1caa4ad4="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                     <path data-v-1caa4ad4="" stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                  </svg>
                               </button>
                            </div>
                         </div>
                       </div>
                    </li>
                 </ul>
              </div>
          </div>
          <div class="border-t border-gray-200 py-2 xl:pt-2">
            <div class="overflow-auto">
                <table class="border-collapse table-auto w-full text-sm">
                   <tbody class="bg-white">
                      <tr class="border-t border-l">
                         <td class="border-b border-r px-2 py-2.5">সাবটোটাল</td>
                         <td class="border-b border-r px-2 py-2.5"><span class="product_total">{{$product->sale_price}}</span> টাকা</td>
                      </tr>
                      <tr class="border-t border-l">
                         <td class="border-b border-r px-2 py-2.5">শিপিং</td>
                         <td class="border-b border-r px-2 py-2.5">
                            <div>
                               <div><input type="radio" id="odhd" class="shipping_charge" value="130" name="shipping_charge" checked> <label for="odhd" class="form-check-label">Outside Dhaka Home Delivery - 130 tk - 24/48H</label></div>
                               <div><input type="radio" id="idhd" class="shipping_charge" value="60" name="shipping_charge"> <label for="idhd" class="form-check-label">Inside Dhaka Home Delivery - 60 tk - 24/48H</label></div>
                            </div>
                         </td>
                      </tr>
                      <tr class="border-t border-l">
                         <td class="border-b border-r px-2 py-2.5">সর্বমোট</td>
                         <td class="border-b border-r px-2 py-2.5"><span class="grand_total">{{$product->sale_price + 130}}</span> টাকা</td>
                      </tr>
                      <tr class="border-t border-l">
                         <td class="border-b border-r px-2 py-2.5">পেমেন্ট মাধ্যম</td>
                         <td class="border-b border-r px-2 py-2.5">
                            <div><input type="radio" id="payment_cod" value="cod" checked> <label for="payment_cod" class="form-check-label">Cash on Delivery</label></div>
                         </td>
                      </tr>
                   </tbody>
                </table>
             </div>

             <div class="mt-6 hidden md:block">
                <button type="submit" class="text-center rounded-md border-2 bg-green-800 border-green-800 px-6 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 block w-full">Order Now</button>
             </div>
          </div>
       </div>
    </form>
</div>
