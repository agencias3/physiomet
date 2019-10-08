@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20">
                {{ $product->name }}
            </h1>
        </div>
    </section>
    <section class="w-100 p-bottom-50 p-bottom-1024-30">
        <div class="center">
            <div class="w-90 m-left-5 d_flex bg-white-1 box-middle-1 relative column-800 w-1024-100 p-top-1024-30 p-bottom-1024-30">
                <aside class="flex-1 w-800-100 t-align-800-c" data-scroll-reveal="enter right move 50px">
                    <div class="w-100 text">
                        {!! $product->resume !!}
                    </div>
                    @if(!$files->isEmpty())
                    <div class="w-100 buttons d_flex wrap justify-800-center">
                        @foreach($files as $row)
                        <a class="d_flex justify-center c-left main-bg smooth w-600-100" target="_blank" href="{{ asset('uploads/product/file/'.$row->file) }}" title="{{ $row->name }}">
                            <figure class="self-center">
                                <img src="{{ asset('assets/site/images/pdf.png') }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                            </figure>
                            <span class="self-center smooth">
                                {!! $row->name !!}
                            </span>
                        </a>
                        @endforeach
                    </div>
                    @endif
                </aside>
                @if(!$images->isEmpty())
                <section class="d_flex flex-1 flex-order-1 justify-center bg-white b-radius-10 w-800-100 m-top-800-30 order-800-2" data-scroll-reveal="enter left move 50px">
                    <div class="w-100 d_flex">
                        <ul class="w-100 slider-slick-1-2">
                            @foreach($images as $row)
                            <li class="f-left">
                                <a class="def-100 h-100 d_flex justify-center html5lightbox" data-group="images" href="{{ asset('uploads/product/'.$row->image) }}" title="{{ $row->label }}">
                                    <figure class="self-center">
										<img class="max-w-100" src="{{ asset('uploads/product/'.$row->image) }}" title="{{ $row->label }}" alt="{{ $row->label }}" />
                                    </figure>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
                @endif
            </div>
            @if(isPost($product->description))
            <div class="w-70 m-left-15 m-top-40 b-radius-10 overflow-h box-shadow box-info w-1024-100 m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
                <h2 class="w-100 p-top-18 p-bottom-18 t-align-c secondary-bg-1 f-w-800 color-white f-size-30 f-size-1024-26 f-size-600-20">
                    Ficha Técnica
                </h2>
                <div class="w-100 text t-align-1024-c">
                    {!! $product->description !!}
                </div>
            </div>
            @endif
            @if(isset($product->video))
			<section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
				<div class="center">
					<article class="w-100 t-align-c" data-scroll-reveal="enter bottom move 50px">
                        {!! (new \AgenciaS3\Services\UtilObjeto)->video($product->video, 'display-inline-block max-w-100', '560', '315') !!}
					</article>
				</div>
			</section>
            @endif
            @if(!$texts->isEmpty())
                @foreach($texts as $row)
            <div class="w-90 m-left-5 m-top-40 d_flex bg-white-1 box-middle-2 relative w-1024-100 p-top-1024-30 p-bottom-1024-30 column-800">
                <aside class="flex-1 w-800-100 t-align-800-c" data-scroll-reveal="enter left move 50px">
                    <span class="w-100 l-height-14 f-w-800 color-grey-1 f-size-30 f-size-1024-26 f-size-600-20">
                        {!! $row->name !!}
                    </span>
                    <div class="w-100 m-top-20 text">
                        {!! $row->description !!}
                    </div>
                </aside>
                @if(isPost($row->image))
                    <section class="d_flex flex-1 justify-center b-radius-10 w-800-100 m-top-800-30 order-800-2" data-scroll-reveal="enter right move 50px">
                        <div class="w-100 d_flex p-bottom-10">
                            <img src="{{ asset('uploads/product/text/'.$row->image) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                        </div>
                    </section>
                    <!--
                <section class="d_flex flex-1 justify-center b-radius-10 w-800-100 m-top-800-30 order-800-2" data-scroll-reveal="enter right move 50px">
                    <div class="w-100 d_flex p-bottom-10">
                        <ul class="w-100 slider-slick-video">
                            <li  class="f-left">
                                <div class="w-100 relative z-index-1">
                                    <iframe class="w-100" width="100%" height="290px" src="https://www.youtube.com/embed/ptzzU7jFQwo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </li>
                            <li  class="f-left">
                                <div class="w-100 relative z-index-1">
                                    <iframe class="w-100" width="100%" height="290px" src="https://www.youtube.com/embed/ptzzU7jFQwo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </li>
                            <li  class="f-left">
                                <div class="w-100 relative z-index-1">
                                    <iframe class="w-100" width="100%" height="290px" src="https://www.youtube.com/embed/ptzzU7jFQwo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                -->
                @endif
            </div>
                @endforeach
            @endif
        </div>
    </section>
    @if(!$products->isEmpty())
    <section class="w-100 p-top-50 p-bottom-40 bg-white-1 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h3 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Nossos Principais Produtos
            </h3>
            <div class="w-100 d_flex wrap justify-center list-group" data-scroll-reveal="enter bottom move 50px">
                @foreach($products as $row)
				<div class="item d_flex t-align-c">
					<div class="w-100 d_flex direction-column self-end">
						@if(isset($row->icon))
							<figure class="w-100">
								<img class="max-w-100" src="{{ asset('uploads/category/'.$row->icon) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
							</figure>
						@endif
						<strong class="w-100 m-top-30 f-w-800 secondary-color-1 f-size-24">
							{{ $row->name }}
						</strong>
						<div class="w-100 m-top-25 text">
							{!! $row->resume !!}
						</div>
						<div class="w-100 m-top-20">
							<a class="display-inline-block main-bg smooth see-more" href="{{ route('product.category', $row->seo_link) }}" title="Ver Mais">
								Ver Mais
							</a>
						</div>
					</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if(!$clients->isEmpty())
    <section class="w-100 p-top-50 p-bottom-40 p-top-1024-30 p-bottom-1024-0">
        <div class="center">
            <h4 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Nossos Clientes
            </h4>
            <ul class="w-90 m-top-50 m-left-5 slider-slick-3 w-1024-100 m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
                @foreach($clients as $row)
                    <li>
                        <a class="d_flex w-100 h-100 justify-center" href="@if(isPost($row->link_url)){{ $row->link_url }}@else javascript:void(0); @endif" title="{{ $row->name }}">
                            <figure class="self-center">
                                <img class="max-w-100" src="{{ asset('uploads/client/'.$row->image) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                            </figure>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @endif
    @include('site.contact._form')
@endsection