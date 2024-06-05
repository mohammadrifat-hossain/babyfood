@extends('landing.layouts.builder')

@section('head')
@include('meta::manager', [
    'title' => $landing->title
])
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.5/assets/owl.carousel.min.css">
@vite('resources/landing/css/app.css', 'build-landing')
{!! $landing->head_code !!}
@endsection

@section('master')
{!! $landing->body_code !!}
@include('l-build-b.'. $landing->theme)
@endsection

@section('footer')

{!! $landing->footer_code !!}

@include('landing.layouts.footer-script')
@endsection
