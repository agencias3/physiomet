@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                {{ $category->name }}
            </h1>
        </div>
    </section>
    <section class="w-100 p-bottom-50 bg-white-1 p-top-1024-0 p-bottom-1024-30">
        <div class="center-2">
            <div class="w-100 d_flex bg-white-1 box-middle-1 relative column-800 w-1024-100 p-top-1024-30 p-bottom-1024-30">
                <aside class="flex-1 w-800-100 t-align-800-c" data-scroll-reveal="enter right move 50px">
                    <div class="w-100 text">
                        {!! $category->description !!}
                    </div>
                </aside>
                @if(isPost($category->icon))
                    <section class="d_flex flex-1 flex-order-1 justify-center bg-white b-radius-10 w-800-100 m-top-800-30 order-800-2" data-scroll-reveal="enter left move 50px">
                        <div class="w-100 d_flex">
                            <ul class="w-100 slider-slick-1-2">
                                <li class="f-left">
                                    <a class="def-100 h-100 d_flex justify-center" href="javascript:void(0);" title="{{ $category->name }}">
                                        <figure class="self-center">
                                            <img class="max-w-100" src="{{ asset('uploads/category/'.$category->icon) }}" title="{{ $category->name }}" alt="{{ $category->name }}" />
                                        </figure>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </section>
                @endif
            </div>
            @if(isPost($category->datasheet))
                <div class="w-70 m-left-15 m-top-40 b-radius-10 overflow-h box-shadow box-info w-1024-100 m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
                    <h2 class="w-100 p-top-18 p-bottom-18 t-align-c secondary-bg-1 f-w-800 color-white f-size-30 f-size-1024-26 f-size-600-20">
                        Ficha Técnica
                    </h2>
                    <div class="w-100 text t-align-1024-c">
                        {!! $category->datasheet !!}
                    </div>
                </div>
            @endif
            @if($products->isEmpty())
                <div class="w-100 m-top-40 m-bottom-30 t-align-c f-size-20" data-scroll-reveal="enter bottom move 50px">
                    Nenhum produto encontrado!
                </div>
            @else
            <div class="w-100 d_flex wrap justify-center list-group list-group-edit w-1024-100">
                <h2 class="w-100 t-align-c m-top-60 color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 20px">
                    MODULOS
                </h2>
                @foreach($products as $row)
                <div class="item m-top-50 t-align-c" data-scroll-reveal="enter bottom move 50px">
                    @if(isPost($row->icon))
                    <figure class="w-100">
                        <img class="max-w-100" src="{{ asset('uploads/product/'.$row->icon) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                    </figure>
                    @endif
                    <strong class="w-100 m-top-30 f-w-800 secondary-color-1 f-size-24">
                        {{ $row->name }}
                    </strong>
                    <div class="w-100 m-top-25 text">
                        {!! $row->resume !!}
                    </div>
                    <div class="w-100 m-top-20">
                        <a class="display-inline-block main-bg smooth see-more" href="{{ route('product.show', ['category' => $row->category->seo_link, 'seo_link' => $row->seo_link]) }}" title="Ver Mais">
                            Ver Mais
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @include('site.contact._form')
@endsection