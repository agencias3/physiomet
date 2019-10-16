@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    @include('site.home.banner')
    @include('site.home.about')

    <section class="w-100 p-top-40 p-bottom-100 content w-1024-100 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            @include('site.home.type')
            @include('site.home.service')
            @include('site.home.blog')
        </div>
    </section>
@endsection