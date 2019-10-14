<?php
$route = route('blog.show', ['seo_link' => $row->seo_link]);
$cover = '';
$image = $row->images->firstWhere('cover', 'y');
if(isPost($image)){
    $cover = asset('uploads/post/'.$image->image);
}
?>
<div class="item w-600-100">
    @if(isPost($cover))
    <figure class="w-100 b-radius-15 overflow-h">
        <a class="w-100" href="{{ $route }}" title="{{ $row->name }}">
            <img class="w-100 relative z-index-1" src="{{ $cover }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
        </a>
    </figure>
    @endif
    <div class="w-100 d_flex direction-column">
        <span class="m-top-20 color-grey f-size-16">
            {{ mysql_to_data($row->date) }}
        </span>
        <strong class="m-top-15 l-height-14 main-color-1 f-size-20 font-3">
            {{ $row->name }}
        </strong>
        <div class="m-top-10 color-grey text">
            <p>
                {!! resume(strip_tags($row->description), 150) !!}
            </p>
        </div>
        <span class="m-top-15 d_flex justify-1024-center">
            <a class="d_flex t-decoration" href="{{ $route }}" title="Leia mais">
                <span>Leia mais</span>
                <b>&#10095;</b>
            </a>
        </span>
    </div>
</div>