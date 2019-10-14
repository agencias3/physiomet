@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-80 p-top-1024-15 p-bottom-1024-30">
        <div class="center">
            <div class="w-100 container w-600-100">
                @include('site.layouts.bread-crumbs')
                <div class="w-100">
                    <h1 class="f-left m-top-50 t-align-c main-color f-size-26 font-3 w-1024-100 m-top-1024-30 t-align-1024-c f-size-1024-20">
                        Blog/Notícias
                    </h1>
                    <form class="f-right m-top-40 b-radius-50 overflow-h d_flex form-search w-1024-100 m-top-1024-30" id="fSearch" method="get" action="">
                        <input class="flex-1" type="text" id="txt" name="search" value="" placeholder="Procurar no Blog *" required />
                        <input class="pointer" type="submit" id="send-search" value="" />
                    </form>
                </div>
            </div>
            <article class="w-100 m-top-15 d_flex wrap justify-center list-group-3 m-top-1024-0 t-align-1024-c">
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
            </article>
            @if(!$tags->isEmpty())
            <div class="w-100 m-top-80 d_flex justify-center m-top-1024-30">
                <div class="box-tags relative z-index-1 w-1024-100">
                    <a class="d_flex relative z-index-2 justify-space b-radius-10 open-tags display-1024-none" onclick="openTags()" href="javascript:void(0);" title="Exibir todas as TAGS">
                        <span>
                            Exibir todas as TAGS
                        </span>
                        <b>
                            +
                        </b>
                    </a>
                    <span class="w-100 p-top-15 p-bottom-15 b-radius-10 relative z-index-2 t-align-c main-bg color-white f-size-20 font-2 display-none display-1024-block">
                        Tags
                    </span>
                    <nav class="w-100 absolute z-index-1 top-100 left-0 display-none display-1024-block position-1024-relative top-1024-0">
                        <ul class="w-100 c-left bg-white d_flex wrap justify-1024-center">
                            @foreach($tags as $row)
                            <li>
                                <a href="{{ route('blog.tag', $row->seo_link) }}" title="#{{ $row->name }}">
                                    #{{ $row->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection