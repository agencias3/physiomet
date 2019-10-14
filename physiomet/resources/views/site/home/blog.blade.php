@if(isPost($posts))
<h3 class="w-100 m-top-80 t-align-c secondary-color f-size-24 m-top-1024-30">
    BLOG
</h3>
<div class="w-100 m-top-25 t-align-c main-color text text-2">
    <?php $page->show(2); ?>
    {!! session()->get('page')[2]['description'] !!}
</div>
<article class="w-100 m-top-15 d_flex wrap justify-center list-group-3 m-top-1024-0 t-align-1024-c">
    @foreach($posts as $row)
        @include('site.blog._li_list')
    @endforeach
</article>
@endif