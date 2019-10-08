@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(1); ?>
    <section class="w-100 p-top-50 p-bottom-10 p-top-1024-30 p-top-1024-30 p-bottom-1024-0">
        <div class="center">
            <h2 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Segmentos Wesa
            </h2>
        </div>
    </section>
    <section class="w-100">
        <div class="center">
            <div class="w-90 m-left-5 m-top-40 d_flex bg-white-1 box-middle-2 relative w-1024-100 p-top-1024-30 p-bottom-1024-30 m-top-1024-30 column-800">
                <aside class="flex-1 w-800-100" data-scroll-reveal="enter left move 50px">
                    <h1 class="w-100 l-height-14 f-w-800 color-grey-1 f-size-40 f-size-1024-26 t-align-800-c f-size-600-20">
                        {{ $segment->name }}
                    </h1>
                    <div class="w-100 m-top-20 text t-align-800-c">
                        {!! $segment->description !!}
                    </div>
                    @if(isPost($segment->file))
                    <div class="w-100 buttons d_flex wrap justify-800-center">
                        <a class="d_flex justify-center main-bg smooth" target="_blank" href="{{ asset('uploads/segment/'.$segment->file) }}" title="Baixar PDF com Informações">
                            <figure class="self-center">
                                <img class="f-left" src="{{ asset('assets/site/images/pdf.png') }}" title="Baixar PDF com Informações" alt="Baixar PDF com Informações" />
                            </figure>
                            <span class="self-center smooth">
                                Baixar PDF com<br />
                                Informações
                            </span>
                        </a>
                    </div>
                    @endif
                </aside>
                @if(isPost($images))
                <section class="d_flex flex-1 flex-order-1 justify-center bg-white overflow-h b-radius-10 w-800-100 m-top-800-30" data-scroll-reveal="enter right move 50px">
                    <div class="w-100 d_flex">
                        <ul class="w-100 slider-slick-1-2">
                    @foreach($images as $row)
                            <li class="f-left">
                                <a class="def-100 h-100 d_flex justify-center html5lightbox" data-group="images" href="{{ asset('uploads/segment/'.$row->image) }}" title="{{ $row->label }}">
                                    <figure class="self-center">
										<img class="max-w-100" src="{{ asset('uploads/segment/'.$row->image) }}" title="{{ $row->label }}" alt="{{ $row->label }}" />
                                    </figure>
                                </a>
                            </li>
                    @endforeach
                        </ul>
                    </div>
                </section>
                @endif
            </div>
        </div>
    </section>
    @if(!$clients->isEmpty())
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h4 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Nossos Clientes
            </h4>
            <ul class="w-90 m-top-50 m-left-5 slider-slick-3 w-1024-100 m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
                @foreach($clients as $row)
                <li>
                    <a class="d_flex w-100 h-100 justify-center" href="@if(isPost($row->link_url)){{ $row->link_url }}@else javascript:void(0); @endif" title="{{ $row->name }}">
                        <figure class="self-center">
                            <img class="max-w-100" src="{{ asset('uploads/client/'.$row->image) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                        </figure>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    @endif
    @if(!$products->isEmpty())
    <section class="w-100 p-top-50 p-bottom-40 bg-white-1 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h3 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Produtos Relacionados
            </h3>
            <div class="w-100 d_flex wrap justify-center list-group" data-scroll-reveal="enter bottom move 50px">
                @foreach($products as $row)
                <div class="item t-align-c">
                    @if(isPost($row->icon))
                        <figure class="w-100 m-bottom-30">
                            <img class="max-w-100" src="{{ asset('uploads/product/'.$row->icon) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                        </figure>
                    @endif
                    <strong class="w-100 f-w-800 secondary-color-1 f-size-24">
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
        </div>
    </section>
    @endif
    @if(!$posts->isEmpty())
    <section class="w-100 p-top-50 p-top-1024-0">
        <div class="center">
            <article class="w-90 m-left-5 w-1024-100 m-top-1024-30">
                <h3 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                    Notícias Relacionadas
                </h3>
                <div class="w-100 m-top-20 d_flex wrap justify-center list-group-3 m-top-1024-0 t-align-600-c">
                    @foreach($posts as $row)
                        @include('site.blog._li_list')
                    @endforeach
                </div>
                <div class="w-100 m-top-60 t-align-c m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
                    <a class="display-inline-block main-bg smooth see-more see-more-2 w-600-100" href="{{ route('blog') }}" title="Ver Todas as Publicações">
                        Ver Todas as Publicações
                    </a>
                </div>
            </article>
        </div>
    </section>
    @endif
    @include('site.contact._form')
@endsection