<?php
$route = route('blog.show', ['seo_link' => $row->seo_link]);
$cover = '';
$image = $row->images->firstWhere('cover', 'y');
if(isPost($image)){
    $cover = asset('uploads/post/'.$image->image);
}
?>
<div class="item" data-scroll-reveal="enter bottom move 50px">
    <a class="w-100" href="{{ $route }}" title="{{ $row->name }}">
        @if(isPost($cover))
            <figure class="w-100">
                <img class="w-100" src="{{ $cover }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
            </figure>
        @endif
        <div class="w-100 d_flex direction-column">
            <div class="w-100 c-left">
                <img class="display-inline-block m-top-3 f-600-n" src="/wesa/assets/site/images/date.png" title="{{ $row->name }}" alt="{{ $row->name }}" />
                <span class="display-inline-block m-left-15-px color-grey f-size-14 f-w-400 f-600-n">
                    {{ mysql_to_data($row->date) }}
                </span>
            </div>
            <span class="w-100 m-top-10">
            {{ $row->name }}
            </span>
            <div class="w-100 m-top-10 text">
                <p>
                    {!! resume(strip_tags($row->description), 150) !!}
                </p>
            </div>
        </div>
    </a>
</div>