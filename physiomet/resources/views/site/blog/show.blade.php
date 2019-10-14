@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-top-1024-15">
        <div class="center">
            <div class="w-80 m-left-10 w-1024-100">
                @include('site.layouts.bread-crumbs')
                <h1 class="w-100 m-top-50 t-align-c f-size-26 main-color-1 font-2 m-top-1024-30 t-align-1024-c f-size-1024-20">
                    {{ $post->name }}
                </h1>
                <span class="w-100 t-align-c m-top-30 color-grey f-size-16 m-top-1024-20">
                    {{ mysql_to_data($post->date) }}
                </span>
            </div>
        </div>
    </section>
    <section class="w-100 p-top-50 p-bottom-80 content p-top-1024-15 p-bottom-1024-30">
        <div class="center">
            <div class="w-80 m-left-10 container w-1024-100">
                @if(!$images->isEmpty())
                <ul class="w-80 m-left-10 b-radius-20 overflow-h gallery slider-slick-1 w-1024-100">
                    @foreach($images as $row)
                    <li class="f-left">
                        <figure class="d_flex justify-center">
                            <a class="max-w-100 b-radius-20 overflow-h html5lightbox" data-group="images" href="{{ asset('uploads/post/'.$row->image) }}">
                                <img class="max-w-100 max-h-450-px relative z-index-1" src="{{ asset('uploads/post/'.$row->image) }}" title="{{ $row->label }}" alt="{{ $row->label }}" />
                            </a>
                        </figure>
                    </li>
                    @endforeach
                </ul>
                @endif
                <div class="w-100 m-top-50 text m-top-1024-30 t-align-1024-c">
                    {!! $post->description !!}
                </div>
                @if(!$postTags->isEmpty())
                    <ul class="w-100 m-top-30 d_flex wrap list-group-tags m-top-1024-20 justify-1024-center" data-scroll-reveal="enter bottom move 50px" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                        <li>
                            TAGS:
                        </li>
                        @foreach($postTags as $row)
                            <li>
                                <a href="{{ route('blog.tag', $row->tag->seo_link) }}" title="{{ $row->tag->name }}">
                                    #{{ $row->tag->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="w-100 m-top-50 d_flex wrap box-social-page m-top-1024-20 direction-600-column">
                    <section class="c-left d_flex w-600-100 justify-600-center">
                        <a class="self-center t-decoration" href="{{ route('blog') }}" title="Voltar para o Blog">
                            <img class="m-top-2" src="{{ asset('assets/site/images/back.png') }}" title="Voltar para o Blog" alt="Voltar para o Blog">
                            <span class="m-left-15-px main-color f-size-16">
                                Voltar para o Blog
                            </span>
                        </a>
                    </section>
                    <aside class="c-left flex-1 d_flex justify-end justify-600-center m-top-600-20">
                        <ul class="d_flex">
                            <li class="self-center main-color f-size-16 display-600-none">
                                COMPARTILHAR
                            </li>
                            <li class="m-left-10-px m-left-600-0">
                                <a href="https://www.facebook.com/sharer.php?u={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Facebook">
                                    <img src="{{ asset('assets/site/images/icon-social-1.png') }}" title="Facebook" alt="Facebook">
                                </a>
                            </li>
                            <li class="m-left-10-px">
                                <a href="http://twitter.com/home?status={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Twitter">
                                    <img src="{{ asset('assets/site/images/icon-social-2.png') }}" title="Twitter" alt="Twitter">
                                </a>
                            </li>
                            <li class="m-left-10-px">
                                <a href="https://plus.google.com/share?url={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="GooglePlus">
                                    <img src="{{ asset('assets/site/images/icon-social-3.png') }}" title="GooglePlus" alt="GooglePlus">
                                </a>
                            </li>
                            <li class="m-left-10-px">
                                <a href="mailto:email@email.com?subject={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="E-mail">
                                    <img src="{{ asset('assets/site/images/icon-social-4.png') }}" title="Whatssapp" alt="Whatsapp">
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
            @if(!$posts->isEmpty())
            <div class="w-80 m-left-10 w-1024-100">
                <h2 class="w-100 m-top-80 t-align-c f-size-26 main-color-1 font-2 m-top-1024-30 f-size-1024-20">
                    Notícias Relacionadas
                </h2>
                <article class="w-100 m-top-15 d_flex wrap justify-center list-group-3 list-group-3-1 m-top-1024-0 t-align-1024-c">
                    @foreach($posts as $row)
                        @include('site.blog._li_list')
                    @endforeach
                </article>
            </div>
            @endif
        </div>
    </section>
@endsection