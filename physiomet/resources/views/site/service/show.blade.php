@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-80 p-top-1024-15 p-bottom-1024-30">
        <div class="center">
            <div class="w-100 container w-1024-100">
                @include('site.layouts.bread-crumbs')
                <div class="w-100">
                    <h1 class="f-left m-top-50 t-align-c main-color f-size-26 font-3 w-1024-100 m-top-1024-30 t-align-1024-c f-size-1024-20">
                        {{ $service->name }}
                    </h1>
                </div>
                <article class="w-100 m-top-50 d_flex wrap page-service m-top-1024-30">
                    <section class="flex-1 p-right-50-px d_flex direction-column">
                        <div class="text">
                            {!! $service->description !!}
                        </div>
                    </section>
                    @if(!$images->isEmpty())
                    <aside class="w-1024-100 m-top-1024-30">
                        <ul class="w-100 b-radius-20 overflow-h gallery slider-slick-1">
                            @foreach($images as $row)
                            <li class="f-left">
                                <figure>
                                    <a class="max-w-100 b-radius-20 overflow-h html5lightbox" data-group="images" href="{{ asset('uploads/service/'.$row->image) }}">
                                        <img class="w-100 relative z-index-1" src="{{ asset('uploads/service/'.$row->image) }}" title="{{ $row->label }}" alt="{{ $row->label }}" />
                                    </a>
                                </figure>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    @endif
                </article>
            </div>
        </div>
    </section>
@endsection