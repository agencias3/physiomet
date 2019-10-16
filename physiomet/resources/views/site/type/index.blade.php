@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-80 p-top-1024-15 p-bottom-1024-30">
        <div class="center">
            <div class="w-100 container w-1024-100">
                @include('site.layouts.bread-crumbs')
                <div class="w-100 m-top-50 m-top-1024-30">
                    <h1 class="f-left t-align-c main-color f-size-26 font-3 w-1024-100 f-size-1024-20">
                        Tipos de Fisioterapia
                    </h1>
                </div>
                <article class="w-100 d_flex wrap direction-column justify-center list-group-7">
                    @if($types->isEmpty())

                    @else
                        @include('site.type._list')
                    @endif
                </article>
            </div>
        </div>
    </section>
@endsection