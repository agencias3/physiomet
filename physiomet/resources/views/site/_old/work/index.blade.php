@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <section class="w-100 p-top-50 p-top-1024-30 ">
        <div class="center">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20">
                Trabalhe Conosco
            </h1>
        </div>
    </section>
    <section class="w-100 p-top-70 p-bottom-70 m-top-40 box-contact p-top-1024-30 p-bottom-1024-30 m-top-1024-30">
        <div class="center">
            <h2 class="w-100 t-align-c color-white f-size-40 f-w-800 f-size-1024-26 f-size-600-20">
                Venha Fazer Parte da Wesa
            </h2>
            <div class="w-100 m-top-50 t-align-c m-top-1024-30">
                @include('site.work._form')
            </div>
        </div>
    </section>
    @include('site.contact._info')
@endsection