@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
        <div class="center-2">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Notícias
            </h1>
            <div class="w-100 m-top-40 t-align-c d_flex justify-center form-search-page m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
                <form class="d_flex b-radius-50 overflow-h form-search w-600-100" id="fSearch" method="get" action="{{ route('blog') }}">
                    <fieldset class="flex-1">
                        <input type="text" name="search" id="search-txt" value="@if(isset($search)){{ $search }}@endif" placeholder="Buscar no site... *" required />
                    </fieldset>
                    <fieldset class="flex-1">
                        <input class="pointer" type="submit" id="send-search" value="" />
                    </fieldset>
                </form>
            </div>
            <div class="w-100 m-top-20 d_flex wrap justify-center list-group-3 m-top-1024-0 t-align-600-c">
                @if(isPost($search))
                    <div class="w-100 t-align-c f-size-20 m-top-30 m-bottom-30 color-black" data-scroll-reveal="enter bottom move 80px">
                        Foram encontrado(s) "<strong class="f-w-600 color-black">{{ $posts->count() }}</strong>" resultados pelo termo "<strong class="f-w-600 color-black-2">{{ $search }}</strong>".
                    </div>
                @endif
                @if($posts->isEmpty())
                    <div class="w-100 m-top-30 m-bottom-30 t-align-c f-size-20" data-scroll-reveal="enter bottom move 50px">
                        Nenhum post encontrado!
                    </div>
                @else
                    <?php
                    $cont = 0;
                    $cont2 = 0;
                    $total = $posts->count();
                    $contSpan = 0;
                    ?>
                    @foreach($posts as $row)
                        @include('site.blog._li_list')
                    @endforeach
                    @if(!$posts->isEmpty())
                        {!! $posts->links() !!}
                    @endif
                @endif
            </div>
        </div>
    </section>
    @if(!$tags->isEmpty())
    <section class="w-100 p-top-20 p-bottom-20 m-top-40 bg-white-1 m-top-1024-10">
        <div class="center-2">
            <ul class="w-100 d_flex wrap justify-center list-group-tags" data-scroll-reveal="enter bottom move 50px">
                <li>
                    TAGS:
                </li>
                @foreach($tags as $row)
                    <li>
                        <a href="{{ route('blog.tag', $row->seo_link) }}" title="{{ $row->name }}">
                            {{ $row->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @endif
    @include('site.contact._form')
@endsection