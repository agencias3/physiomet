@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(12); ?>
    @include('site.layouts._header_page', ['id' => 12, 'image' => asset('uploads/page/'.session()->get('page')[12]['banner'])])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-30 p-top-1024-20 p-bottom-1024-20">
            <div class="center-2">
				@include('site.layouts.bread-crumbs')
            </div>
        </div>
    </section>
    <section class="w-100 p-bottom-50 p-bottom-1024-30">
        <div class="center-2">
            @if($enterprises->isEmpty())
                <div class="w-100 m-top-30 m-bottom-30 t-align-c f-size-20">
                    Nenhum seguimento encontrado!
                </div>
            @else
            <div class="w-80 m-left-10 d_flex list-segment w-1024-100 column-600">
                @foreach($enterprises as $row)
				<?php
					$cover = asset('assets/site/images/not-image.png');
					$image = $row->images->firstWhere('cover', 'y');
					if(isPost($image)){
						$cover = asset('uploads/enterprise/'.$image->image);
					}
				?>
                <div class="list-items d_flex w-600-100">
                    <a class="w-100 relative" style="background: url({{ $cover }}) no-repeat;background-size: cover;background-position: center center;" href="{{ route('enterprise.show', ['seo_link' => $row->seo_link]) }}" title="{{ $row->name }}">
                        <div class="w-100 h-100 relative z-index-1">
                            @if(isPost($cover))
                            <figure class="w-100">
                                <img class="w-100 opacity-0" src="{{ $cover }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                            </figure>
                            @endif
                            <div class="w-100 h-100 absolute top-0 left-0 smooth">
                                <div class="w-100 absolute top-50 left-0 m-top-50-neg t-align-c bg-black-transparent smooth"></div>
                                <div class="w-100 h-100 relative z-index-2 display-table">
                                    <div class="inline">
                                        <span class="w-100 t-align-c smooth f-size-1024-20">
                                            {{ $row->name }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
			@if(!$enterprises->isEmpty())
				{!! $enterprises->links() !!}
			@endif
            @endif
        </div>
    </section>
@endsection