<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="{{$settings_g['favicon'] ?? ''}}">

    @yield('head')

    {{-- <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;600&display=swap" rel="stylesheet"> --}}

    <style>
        .dynamic_style h1, .dynamic_style h2, .dynamic_style h3, .dynamic_style h4, .dynamic_style h5, .dynamic_style h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        }

        .dynamic_style h1 {
        font-size: 2.5rem;
        }

        .dynamic_style h2 {
        font-size: 2rem;
        }

        .dynamic_style h3 {
        font-size: 1.75rem;
        }

        .dynamic_style h4 {
        font-size: 1.5rem;
        }

        .dynamic_style h5 {
        font-size: 1.25rem;
        }

        .dynamic_style h6 {
        font-size: 1rem;
        }

        .dynamic_style ol,
        .dynamic_style ul,
        .dynamic_style dl {
        margin-top: 0;
        margin-bottom: 1rem;
        }

        .dynamic_style ol ol,
        .dynamic_style ul ul,
        .dynamic_style ol ul,
        .dynamic_style ul ol {
        margin-bottom: 0;
        }

        .dynamic_style ul{display: block;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;}

        .dynamic_style ol{    display: block;
        list-style-type: decimal;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;}
    </style>
</head>
<body>
    @yield('master')

    <footer class="border-t mt-10 pt-10 pb-4 text-center bg-gray-100">
        <div class="container">
            <p class="text-gray-800 mb-0 pb-4">© {{date('Y')}} All Rights Reserved || Developed by <a href="https://eomsbd.com" class=" hover:text-green-800 underline">Best Ecommerce Developer</a>.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    @yield('footer')
</body>
</html>
