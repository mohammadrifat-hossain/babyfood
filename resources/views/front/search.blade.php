@extends('front.layouts.master')

@section('head')
@include('meta::manager', [
    'title' => 'Search Product - ' . ($settings_g['title'] ?? ''),
])
@endsection

@section('master')
    <div class="container max-w-[1224px]">
        @include('front.layouts.breadcrumb', [
            'title' => 'Search result for "' . $search . '"',
            'url' => '#'
        ])

        @if(count($products))
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 mb-6 gap-6 text-center">
                @foreach ($products as $product)
                    @include('front.layouts.product-loop')
                @endforeach
            </div>

            <div class="my-6 mb-8">
                {{$products->appends(Request::except('page'))->links('pagination::tailwind')}}
            </div>
        @else
            <div class="text-center py-40">
                <p class="text-red-600 font-bold text-3xl mb-5">Sorry! No Product Found!</p>

                <a href="{{route('homepage')}}" class="text-center rounded-md border-2 border-primary bg-primary px-6 py-2 text-base font-medium text-font-color-light shadow-sm hover:bg-white hover:text-primary text-white">Home</a>
            </div>
        @endif
    </div>
@endsection
