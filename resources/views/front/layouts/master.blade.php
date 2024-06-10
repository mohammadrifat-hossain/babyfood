<!DOCTYPE html>
@php
    // $categories = App\Models\Product\Category::with('Categories', 'Categories.Categories')->where('for', 'product')->where('category_id', null)->active()->get();
    $cart_summary = App\Repositories\CartRepo::summary();
    $main_menu = cache()->remember('main_menu', (60 * 60 * 24 * 90), function(){
        return App\Models\Menu::with('SingleMenuItems', 'SingleMenuItems.Page', 'SingleMenuItems.Category')->where('name', 'Main Menu')->first();
    });
    $footer_menu = cache()->remember('footer_menu_cache', (60 * 60 * 24 * 90), function(){
        return App\Models\Menu::with('SingleMenuItems', 'SingleMenuItems.Page', 'SingleMenuItems.Category')->where('name', 'Footer Menu')->first();
    });
    $socials = cache()->remember('homepage_social', (60 * 60 * 24 * 90), function(){
        return Info::SettingsGroup('social');
    });

    $widgets = App\Models\Widget::with('Menu', 'Menu.SingleMenuItems')->where('status', 1)->where('placement', 'Footer')->orderBy('position')->get();
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        :root {
          --primary: {{$settings_g['primary_color'] ?? "#c04000"}};
          --primary_light: {{$settings_g['primary_light_color'] ?? "#ff686e"}};
          --secondary:{{$settings_g['secondary_color'] ?? "#21cd9c"}};
          --secondary_dark:{{$settings_g['secondary_dark_color'] ?? "#047857"}};
        }
    </style>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{$settings_g['favicon'] ?? ''}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    @vite('resources/front/css/app.css')

    @yield('head')

    {!! $settings_g['custom_head_code'] ?? '' !!}

    <script>
        let base_url = "{{route('homepage')}}";
        let _token = '{{csrf_token()}}';

        function toggleMenu(){
            let mobile_menu = document.getElementById("mobile_menu");
            mobile_menu.classList.toggle('mobile_menu_hidden');
        }
    </script>
</head>
<body>
    {!! $settings_g['custom_body_code'] ?? '' !!}

    <div class="fixed top-0 left-0 bg-gray-500 bg-opacity-80 w-full h-full text-center z-50 pt-20 page_loader_hidden" id="page_loader">
        <svg class="animate-spin -ml-1 mr-3 h-8 w-8 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>
    <header class="relative bg-[white]">
        <p class="flex items-center justify-center text-white py-2 bg-[#222222] text-center">{!! $settings_g['headline'] !!}</p>

        <div class="bg-white relative">
            <nav aria-label="Top" class="container">
                <div class="py-2">
                    <div class="grid grid-cols-12 items-center relative">
                      <div class="col-span-6 flex">
                          <button type="button" class="bg-white p-2 rounded-md text-black lg:hidden" onclick="toggleMenu()">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                          </button>

                          <!-- Logo -->
                          <div class="ml-4 lg:ml-0">
                            <a href="{{route('homepage')}}"><img class="h-14 w-auto max-w-full object-contain object-left" width="135" height="55" src="{{$settings_g['logo'] ?? ''}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}"></a>
                          </div>
                      </div>

                      <div class="col-span-6">
                          <div class="flex justify-end gap-2">
                              <form action="{{route('search')}}" class="border-[#22222226] border rounded-full overflow-hidden w-64 max-w-full hidden md:flex" method="get">
                                  <input type="text" name="search" value="{{request('search')}}" class="w-full focus:outline-none p-2 ml-2 placeholder:font-[300] font-[300]" placeholder="Search for products">

                                  <button type="submit" class="search-btn px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-[#222222]">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                  </button>
                              </form>

                              <div class="flex">
                                <!-- Search -->
                                <div class="flex lg:ml-6 md:hidden">
                                  <a href="#" class="p-2 pt-0 text-gray-600 hover:text-gray-800" onclick="toggleSearch()">
                                    <svg class="w-6 h-6 mt-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                  </a>
                                </div>

                                <!-- User Icon -->
                                @auth
                                <div class="ml-4 flow-root lg:ml-6 py-2">
                                  <a href="{{route('auth.dashboard')}}" class="group -m-2 p-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                      </svg>
                                      <span class="text-[#222] font-light hidden md:inline-block">Dashboard</span>
                                  </a>
                                  @else
                                    <a href="{{route('login')}}" class="group -m-2 p-2 flex items-center">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <span class="text-[#222] font-light hidden md:inline-block">Sign in/Sign up</span>
                                    </a>
                                  @endauth
                                </div>

                                <!-- Cart -->
                                <div class="ml-4 flow-root lg:ml-6 py-2">
                                  <a href="{{route('cart')}}" class="group -m-2 p-2 flex items-center relative">
                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-600 group-hover:text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>

                                    <span class="ml-2 font-medium top_cart_count bg-[#222] w-[15px] h-[15px] text-center text-white leading-[18px] text-xs rounded-full absolute top-3 right-0">{{$cart_summary['count']}}</span>
                                  </a>
                                </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </nav>

            <nav class="hidden lg:block">
                <div class="container">
                    <div class="px-16 mb-5">
                        <div class="border-b">
                            @if(env('APP_MAIN_MENU') == 'Menu')
                                @if($main_menu)
                                    <ul class="text-center uppercase">
                                    @foreach ($main_menu->SingleMenuItems as $menu_item)
                                    <li class="inline-block"><a href="{{$menu_item->menu_info['url']}}" class="inline-block py-2 font-medium hover:text-[#d79290] pr-4">{{$menu_item->menu_info['text']}}</a></li>
                                    @endforeach
                                    </ul>
                                @else
                                    <p>Please create "Main Menu"</p>
                                @endif
                            @else
                            <ul class="text-center uppercase">
                                @foreach ($categories as $category)
                                <li class="inline-block"><a href="{{$category->route}}" class="inline-block py-2 font-medium hover:text-[#d79290] pr-4">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <ul class="border absolute top-14 left-0 w-80 shadow max-w-full bg-white p-2 z-10 mobile_menu_hidden" id="mobile_menu">
                @if(env('APP_MAIN_MENU') == 'Menu')
                @if($main_menu)
                    @foreach ($main_menu->SingleMenuItems as $menu_item)
                    <li><a href="{{$menu_item->menu_info['url']}}">{{$menu_item->menu_info['text']}}</a></li>
                    @endforeach
                @else
                    <li>Please create "Main Menu"</li>
                @endif
                @else
                <ul>
                    @foreach ($categories as $category)
                    <li><a href="{{$category->route}}">{{$category->title}}</a></li>
                    @endforeach
                </ul>
                @endif
            </ul>
        </div>
    </header>

    <div class="bg-primary fixed top-0 left-0 w-full py-2 top_search_hidden" id="search_modal">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="flex col-span-10">
                    <form method="get" action="{{route('search')}}" class="relative w-full">
                      <input type="search" id="search-dropdown" name="search" class="block p-2 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:primary focus:primary" placeholder="Search Product" required="">

                      <button type="submit" class="absolute top-0 right-0 p-2 text-sm font-medium text-white bg-primary-light rounded-r-lg border border-primary-light focus:ring-4 focus:outline-none">
                          <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                      </button>
                    </form>
                </div>
                <button class="col-span-2 text-right" onclick="toggleSearch()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white mt-1 ml-1 font-semibold inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                </button>
            </div>
        </div>
    </div>

    @yield('master')

    <footer class="bg-[#f6f6f8] pt-12">
        <div class="container">
            <div class="grid grid-cols-5 gap-4">
                @foreach ($widgets as $widget)
                    <div>
                        <h2 class="uppercase">{{$widget->title}}</h2>

                        @if($widget->type == 'Menu' && $widget->Menu)
                        <div class="mt-6">
                            <ul class="font-[300] grid grid-cols-1 gap-1.5">
                                @foreach ($widget->Menu->SingleMenuItems as $item)
                                <li><a href="{{$item->menu_info['url']}}" class="hover:text-[#6e6d6d]">{{$item->menu_info['text']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @elseif($widget->type == 'Social')
                        <div class="flex flex-wrap gap-2 mt-6">
                            @foreach ($socials as $social)
                                @if($social->name == 'facebook')
                                    <a href="{{$social->value}}" class="bg-blue-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded-full">
                                    <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" /></svg>
                                    </a>
                                @elseif($social->name == 'twitter')
                                    <a href="{{$social->value}}" class="bg-blue-400 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded-full">
                                    <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" /></svg>
                                    </a>
                                @elseif($social->name == 'instagram')
                                    <a href="{{$social->value}}" class="bg-pink-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 fill-current"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                                    </a>
                                @elseif($social->name == 'linkedin')
                                    <a href="{{$social->value}}" class="bg-blue-600 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded-full">
                                        <svg class="w-5 h-5 fill-current" role="img" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                            <g><path d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055"></path></g>
                                        </svg>
                                    </a>
                                @elseif($social->name == 'youtube')
                                    <a href="{{$social->value}}" class="bg-red-600 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded-full">
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" /></svg>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        @else
                        <div class="mt-6">
                            {!! $widget->text !!}
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-[#222222] text-white">
            <div class="container text-center">
                <p class="mt-4 py-4">{!! $settings_g['copyright'] ?? '' !!} | Developed by <a class="underline" href="https://eomsbd.com">Best E-commerce Website Developer</a></p>
            </div>
        </div>
    </footer>

    @if(Route::is('homepage'))
    @vite('resources/front/js/app.js')
    @endif
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.0/dist/sweetalert2.all.min.js"></script>

    <script src="{{asset('front/custom.js')}}?c=4"></script>

    @if(session('success-alert'))
    <script>
        cAlert('success', "{{session('success-alert')}}");
    </script>
    @endif

    @if(session('error-alert'))
    <script>
        cAlert('error', "{{session('error-alert')}}");
    </script>
    @endif

    <script>
        function addToCart(product_id){
            let single_cart_quantity = $('#single_cart_quantity').val();
            let product_data_id = $('.product_data_id').val();
            if(!product_data_id){
                product_data_id = null;
            }

            $.ajax({
                url: '{{route("cart.add")}}',
                method: 'POST',
                dataType: 'JSON',
                data: {_token: '{{csrf_token()}}', product_id, quantity: single_cart_quantity, product_data_id},
                success: function(result){
                    cAlert('success', "Card added success!");
                    $('.top_cart_count').html(result.cart_count);
                },
                error: function(){
                    cAlert('success', "Something wrong!");
                }
            });
        }
    </script>

    @yield('footer')

    @if(Info::Settings('fb_api', 'track') == 'Yes')
    <script>
        // FB Conversion Track(PageView)
        $(window).on('load', function() {
            $.ajax({
                type: "POST",
                url: "{{ route('fbTrack') }}",
                data: {
                    _token: '{{csrf_token()}}',
                    track_type: 'PageView'
                },
                success: function (response) {
                    if(response == 'true'){
                        console.log('FB Tracked!');
                    }else{
                        console.log('FB Tracked Failed');
                    }
                },
                error: function(){
                    console.log('FB Tracked Error!');
                }
            });
        });
    </script>
    @endif

    {!! $settings_g['custom_footer_code'] ?? '' !!}
</body>
</html>
