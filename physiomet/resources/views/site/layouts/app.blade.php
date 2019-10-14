<?php
$ativo = Route::getCurrentRoute()->uri();
if (Route::getCurrentRoute()->uri() == 'home' || Route::getCurrentRoute()->uri() == '/') {
    $ativo = "home";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/html" lang="{{ app()->getLocale() }}">
<head>
@if(isset(session()->get('configuration')[1]['description']))
{!! session()->get('configuration')[1]['description'] !!}
@endif
@if(isset($seoPage) && isPost($seoPage['script']))
    {!! $seoPage['script'] !!}
@endif

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <base href="{{ config('app.url') }}"/>

    <!-- metas -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="author" content="https://www.agencias3.com.br" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="local"/>
    <meta name="Robots" content="All"/>
    <meta name="revisit" content="7 day" />
    <meta name="url" content="{{ config('app.url') }}"/>
    <link rel="Shortcut Icon" type="image/x-icon" href="{{ asset('assets/site/images/favicon.ico') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}" type="text/css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="w-100 relative">
@if(isset(session()->get('configuration')[2]['description']))
{!! session()->get('configuration')[2]['description'] !!}
@endif
@if(isset($seoPage) && isPost($seoPage['script_body']))
    {!! $seoPage['script_body'] !!}
@endif

@include('site.layouts.header', ['active' => $ativo])
@yield('content')
@include('site.layouts.footer')

<!-- JS -->
<script type="text/javascript" src="{{ asset('assets/site/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/plugins/cycle.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/plugins/masked.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/plugins/lightbox/html5lightbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/plugins/slick/slick.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/plugins/slick/scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/forms.js') }}"></script>

</body>
</html>