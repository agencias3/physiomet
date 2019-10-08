@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(6); ?>
    @include('site.layouts._header_page', ['id' => 6])
    <section class="w-100 m-top-3 content">
        <div class="w-100 p-top-50 p-bottom-30 p-top-1024-20 p-bottom-1024-0">
            <div class="center-2">
                @include('site.layouts.bread-crumbs')
                <div class="w-100 m-top-30 t-align-c">
                    <form class="display-inline-block w-250-px f-none form-filter-2 w-600-100" id="fSearch" method="get" action="{{ route('blog') }}">
                        <div class="w-100 d_flex">
                            <fieldset>
                                <input class="w-100" type="text" name="search" placeholder="O que deseja? *" required>
                            </fieldset>
                            <fieldset>
                                <input class="w-100 pointer" type="submit" value="">
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="w-100 p-bottom-50 p-bottom-1024-30">
        <div class="center">
            @if(isPost($search))
                <div class="w-100 t-align-c f-size-20 m-top-30 m-bottom-30 color-black" data-scroll-reveal="enter bottom move 80px">
                    Foram encontrado(s) "<strong class="f-w-600 color-black">{{ $posts->count() }}</strong>" resultados pelo termo "<strong class="f-w-600 color-black-2">{{ $search }}</strong>".
                </div>
            @endif
            @if($posts->isEmpty())
                <div class="w-100 m-top-30 m-bottom-30 t-align-c f-size-20">
                    Nenhum post encontrado!
                </div>
            @else
            <div class="w-100 d_flex list-news">
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
            </div>
            @endif
            <figure class="w-100 m-top-100 t-align-c m-top-1024-30">
                <img class="display-inline-block" width="35" src="{{ asset('assets/site/images/icons/pin-1.png') }}" title="" alt="" />
            </figure>
        </div>
    </section>
    @if(!$tags->isEmpty())
    <span class="w-100 h-2-px main-bg"></span>
    <section class="w-100 p-top-60 p-bottom-80 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <nav class="w-100 list-group-tags t-align-1024-c">
                <span class="w-100 color-grey f-size-20">
                    Tags
                </span>
                <ul class="w-100 m-top-15 c-left">
                    @foreach($tags as $row)
                    <li>
                        <a href="{{ route('blog.tag', $row->seo_link) }}" title="{{ $row->name }}">
                            {{ $row->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </section>
    @endif
@endsection