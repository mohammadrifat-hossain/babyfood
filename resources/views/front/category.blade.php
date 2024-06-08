@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => $category->title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $category->media_id ? $category->img_paths['medium'] : null,
        'description' => $category->meta_description,
        'keywords' => $category->meta_tags
    ])
@endsection

@section('master')
<div class="container max-w-[1224px]">
    @include('front.layouts.breadcrumb', [
        'title' => $category->title,
        'url' => $category->route
    ])

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 mb-6 gap-6 text-center">
        @foreach ($products as $product)
            @include('front.layouts.product-loop')
        @endforeach
    </div>

    <div class="my-6 mb-8">
        {{$products->links('pagination::tailwind')}}
    </div>
</div>
@endsection
