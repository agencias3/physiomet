<?php
$route = route('blog.show', ['seo_link' => $row->seo_link]);
$cover = '';
$image = $row->images->firstWhere('cover', 'y');
if(isPost($image)){
    $cover = asset('uploads/post/'.$image->image);
}
$date = explode('-', $row->date);
?>
<div class="list-items">
	<a class="w-100 relative" href="{{ $route }}" title="{{ $row->name }}">
		<div class="c-left absolute z-index-2 top-0 left-0 box-date">
			<img width="25" src="{{ asset('assets/site/images/icons/date.png') }}" title="Data" alt="Data" />
			<span>
				<b>
					{{ $date[1] }}
				</b>
				<i></i>
				<b>
					{{ $date[2] }}
				</b>
				<i></i>
				<b>
					{{ substr($date[0], 2, 2) }}
				</b>
			</span>
		</div>
		<div class="w-100 relative z-index-1">
			@if(isPost($cover))
			<figure class="w-100">
				<img class="w-100" src="{{ $cover }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
			</figure>
			@endif
			<div class="w-100 h-100 absolute top-100 left-0 smooth">
				<div class="w-100 h-100 display-table">
					<div class="inline">
						<span class="w-90 m-left-5 t-align-c">
							{!! $row->name !!}
						</span>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>