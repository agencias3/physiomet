@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-top-1024-30">
        <div class="center-2">
            <h2 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Notícias
            </h2>
            <div class="w-80 m-left-10 m-top-40 w-1024-100 m-top-1024-30 t-align-1024-c">
                <h1 class="w-100 l-height-14 t-align-c color-grey f-size-24 f-w-800 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                    {{ $post->name }}
                </h1>
                @if(!$images->isEmpty())
				<ul class="w-80 m-left-10 m-top-40 list-group-gallery slider-slick-1 m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
					@foreach($images as $image)
					<li class="f-left">
						<figure class="w-100 h-100 d_flex justify-center t-align-c">
							<a class="self-center max-w-100 html5lightbox" href="{{ asset('uploads/post/'.$image->image) }}" title="{{ $image->label }}">
								<img class="max-w-100 smooth" src="{{ asset('uploads/post/'.$image->image) }}" title="{{ $image->label }}" alt="{{ $image->label }}" />
							</a>
						</figure>
					</li>
					@endforeach
				</ul>
                @endif
                <div class="w-100 c-left m-top-40 m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
                    <img class="display-inline-block m-top-3 f-1024-n" src="{{ asset('assets/site/images/date.png') }}" title="{{ mysql_to_data($post->date) }}" alt="{{ mysql_to_data($post->date) }}" />
                    <span class="display-inline-block m-left-15-px color-grey f-size-14 f-w-400 f-1024-n">
                        {{ mysql_to_data($post->date) }}
                    </span>
                </div>
                <div class="w-100 m-top-30 text m-top-1024-20" data-scroll-reveal="enter bottom move 50px">
                    {!! $post->description !!}
                </div>
                @if(!$postTags->isEmpty())
                <ul class="w-100 m-top-30 d_flex wrap list-group-tags list-group-tags-2 m-top-1024-20 justify-1024-center" data-scroll-reveal="enter bottom move 50px">
                    <li>
                        TAGS:
                    </li>
                    @foreach($postTags as $row)
                        <li>
                            <a href="{{ route('blog.tag', $row->tag->seo_link) }}" title="{{ $row->tag->name }}">
                                #{{ $row->tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="w-100 m-top-50 d_flex box-social m-top-1024-20 column-600" data-scroll-reveal="enter bottom move 50px">
                    <section class="c-left d_flex w-600-100 justify-600-center">
                        <a class="self-center t-decoration" href="" title="Voltar para o Blog">
                            <img class="m-top-2" src="{{ asset('assets/site/images/back.png') }}" title="Voltar para o Blog" alt="Voltar para o Blog" />
                            <span class="m-left-15-px secondary-color-1 f-size-16 f-w-500">
                                Voltar para o Blog
                            </span>
                        </a>
                    </section>
                    <aside class="c-left flex-1 d_flex justify-end justify-600-center m-top-600-20">
                        <ul class="d_flex">
                            <li class="self-center secondary-color-1 f-size-16 f-w-500">
                                COMPARTILHAR
                            </li>
                            <li class="m-left-10-px">
                                <a href="https://www.facebook.com/sharer.php?u={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Facebook">
                                    <img src="{{ asset('assets/site/images/icon-social-1.png') }}" title="Facebook" alt="Facebook" />
                                </a>
                            </li>
                            <li class="m-left-10-px">
                                <a href="http://twitter.com/home?status={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Twitter">
                                    <img src="{{ asset('assets/site/images/icon-social-2.png') }}" title="Twitter" alt="Twitter" />
                                </a>
                            </li>
                            <li class="m-left-10-px">
                                <a href="https://plus.google.com/share?url={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="GooglePlus">
                                    <img src="{{ asset('assets/site/images/icon-social-3.png') }}" title="GooglePlus" alt="GooglePlus" />
                                </a>
                            </li>
                            <li class="m-left-10-px">
                                <a href="whatsapp://send?text={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Whatsapp">
                                    <img src="{{ asset('assets/site/images/icon-social-4.png') }}" title="Whatssapp" alt="Whatsapp" />
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
			@if(!$posts->isEmpty())
			<h3 class="w-100 m-top-80 t-align-c color-grey f-size-40 f-w-800 m-top-1024-30 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
				Notícias Relacionadas
			</h3>
			<div class="w-100 m-top-30 d_flex wrap justify-center list-group-3 m-top-1024-0">
				@foreach($posts as $row)
					@include('site.blog._li_list')
				@endforeach
			</div>
			@endif
			<div class="w-100 m-top-60 t-align-c m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
				<a class="display-inline-block main-bg smooth see-more see-more-2 w-600-100" href="{{ route('blog') }}" title="Ver Todas as Publicações">
					Ver Todas as Publicações
				</a>
			</div>
        </div>
    </section>
    @include('site.contact._form')
@endsection