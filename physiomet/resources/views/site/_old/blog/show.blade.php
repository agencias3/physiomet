@extends('site.layouts.app')
@section('content')
    <section class="w-100">
        <div class="w-100 p-top-80 p-bottom-30 p-bottom-1024-30 p-top-600-30">
            <div class="center-2">
                @include('site.layouts.bread-crumbs')
                <div class="w-80 m-top-50 m-left-10 w-1024-100 m-top-1024-30 t-align-1024-c">
                    <h1 class="w-100 l-height-14 f-w-800 secondary-color f-size-55 f-size-1024-30 f-size-600-20">
                        {{ $post->name }}
                    </h1>
                    @if(!$images->isEmpty())
						<div class="w-80 m-left-10 m-top-50 w-1024-100 m-top-1024-20">
                            <ul class="f-left slider-slick-1 list-gallery">
								@foreach($images as $image)
                                <li class="f-left">
                                    <figure class="w-100 relative">
                                        <a class="display-inline-block relative html5lightbox active" href="{{ asset('uploads/post/'.$image->image) }}"title="{{ $image->label }}">
                                            <img class="w-100" src="{{ asset('uploads/post/'.$image->image) }}" title="{{ $image->label }}" alt="{{ $image->label }}" />
                                        </a>
                                    </figure>
                                </li>
								@endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="w-100 m-top-30 c-left">
                        <img class="display-inline-block f-1024-n" src="{{ asset('assets/site/images/icons/date.png') }}" title="Data" alt="Dat" />
                        <span class="display-inline-block m-top-2 m-left-10-px color-grey-2 f-size-16 f-1024-n">
                            {{ mysql_to_data($post->date) }}
                        </span>
                    </div>
                    <div class="w-100 m-top-30 color-grey text">
                        {!! $post->description !!}
                    </div>
                    <figure class="w-100 m-top-60 t-align-c m-top-1024-30">
                        <img class="display-inline-block" width="35" src="{{ asset('assets/site/images/icons/pin-1.png') }}" title="" alt="" />
                    </figure>
                    @if(!$postTags->isEmpty())
                    <span class="w-100 h-2-px m-top-50 main-bg m-top-1024-30"></span>
                    <nav class="w-100 m-top-50 list-group-tags m-top-1024-30">
                        <span class="w-100 color-grey f-size-20">
                            Tags Relacionadas
                        </span>
                        <ul class="w-100 m-top-15 c-left">
                            @foreach($postTags as $row)
                            <li>
                                <a href="{{ route('blog.tag', $row->tag->seo_link) }}" title="{{ $row->tag->name }}">
                                    {{ $row->tag->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                    <span class="w-100 h-2-px m-top-50 main-bg m-top-1024-30"></span>
                    @endif
					
					<div class="w-100 p-top-20 p-bottom-20 m-top-50 options-post m-top-1024-20">
						<nav class="f-right c-left w-800-100 t-align-800-c">
							<span class="display-inline-block m-top-8 main-color f-size-18 f-w-600 f-1024-n">
								COMPARTILHAR
							</span>
							<ul class="display-inline-block f-1024-n">
								<li class="m-left-600-0">
									<a href="https://www.facebook.com/sharer.php?u={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Facebook">
										<img src="{{ asset('assets/site/images/icons/icon-social-1.png') }}" title="Facebook" alt="Facebook">
									</a>
								</li>
								<li>
									<a href="http://twitter.com/home?status={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Twitter">
										<img src="{{ asset('assets/site/images/icons/icon-social-2.png') }}" title="Twitter" alt="Twitter">
									</a>
								</li>
								<li>
									<a href="https://plus.google.com/share?url={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="GooglePlus">
										<img src="{{ asset('assets/site/images/icons/icon-social-3.png') }}" title="GooglePlus" alt="GooglePlus">
									</a>
								</li>
								<li>
									<a href="whatsapp://send?text={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="WhatsApp">
										<img src="{{ asset('assets/site/images/icons/icon-social-4.png') }}" title="WhatsApp" alt="WhatsApp">
									</a>
								</li>
							</ul>
						</nav>
						<div class="f-left m-top-10 w-800-100 m-top-800-20 t-align-800-c">
							<a class="display-inline-block f-left c-left t-decoration f-800-n" href="{{ route('blog') }}" title="Voltar para o Blog">
								<img class="m-top-2" src="{{ asset('assets/site/images/icons/back.png') }}" title="Voltar para o Blog" alt="Voltar para o Blog">
								<span class="m-left-15-px main-color f-size-18 f-w-600">
									Voltar para o Blog
								</span>
							</a>
						</div>
					</div>
					
                </div>
            </div>
        </div>
    </section>
@endsection