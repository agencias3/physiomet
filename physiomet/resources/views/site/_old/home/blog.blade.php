@if(!$posts->isEmpty())
<article class="w-90 m-left-5 m-top-60 w-1024-100 m-top-1024-30">
    <h3 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
        Notícias
    </h3>
    <div class="w-100 m-top-20 d_flex wrap justify-center list-group-3 m-top-1024-0 t-align-600-c" data-scroll-reveal="enter bottom move 50px">
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
@endif