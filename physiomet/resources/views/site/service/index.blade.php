@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-80 p-top-1024-15 p-bottom-1024-30">
        <div class="center">
            <div class="w-100 container w-1024-100">
                @include('site.layouts.bread-crumbs')
                <div class="w-100 m-top-50 m-top-1024-30">
                    <h1 class="f-left t-align-c main-color f-size-26 font-3 w-1024-100 f-size-1024-20">
                        Serviços & Especialidades
                    </h1>
                </div>
                <article class="w-100 d_flex wrap direction-column justify-center list-group-7">
                    @if($services->isEmpty())

                    @else
                        @foreach($services as $row)
                            <?php
                            $route = route('service.show', $row->seo_link);
                            $cover = '';
                            $image = $row->images->firstWhere('cover', 'y');
                            if(isPost($image)){
                                $cover = asset('uploads/service/'.$image->image);
                            }
                            ?>
                        <div class="item d_flex wrap w-1024-100 direction-1024-column justify-1024-center">
                            @if($cover)
                            <figure class="w-1024-100">
                                <a class="w-100" href="{{ $route }}" title="{{ $row->name }}">
                                    <img class="w-100 relative z-index-1" src="{{ $cover }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                                </a>
                            </figure>
                            @endif
                            <aside class="flex-1 d_flex self-center direction-column t-align-c w-1024-100">
                                <strong class="l-height-14 main-color-1 f-size-26 font-3 f-size-1024-20">
                                    {{ $row->name }}
                                </strong>
                                <div class="m-top-10 color-grey text">
                                    <p>
                                        {!! resume(strip_tags($row->description), 150) !!}...
                                    </p>
                                </div>
                                <span class="w-100 m-top-20 d_flex justify-center">
                                    <a class="see-more" href="{{ $route }}" title="SAIBA MAIS">
                                        SAIBA MAIS
                                    </a>
                                </span>
                            </aside>
                        </div>
                    @endforeach
                    @endif
                </article>
            </div>
            <h2 class="w-100 m-top-80 main-color f-size-26 font-3 container w-1024-100 m-top-1024-30 t-align-1024-c f-size-1024-20">
                Serviços & Especialidades
            </h2>
            @include('site.home.type')
        </div>
    </section>
@endsection