@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    @include('site.home.banner')
    @include('site.home.product')
    @include('site.home.segment')
    <section class="w-100 p-top-50 p-bottom-30 p-top-1024-30 p-bottom-1024-0">
        <div class="center">
            @include('site.home.tip')
            @include('site.home.blog')
        </div>
    </section>
    @include('site.contact._form')
@endsection