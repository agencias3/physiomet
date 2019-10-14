<header class="w-100 p-top-20 p-bottom-20 absolute z-index-8 top-0 left-0 <?php if(Route::getCurrentRoute()->uri() != 'home' && Route::getCurrentRoute()->uri() != '/'){ ?> header-internal<?php } ?>">
	<div class="center-2">
		<article class="w-100 d_flex">
			<figure class="d_flex self-center c-left main-logo">
				<a href="" title="">
					<img class="max-w-100" src="{{ asset('assets/site/images/main-logo.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
					<img class="max-w-100 display-none" src="{{ asset('assets/site/images/main-logo-2.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
				</a>
			</figure>
			<nav class="d_flex flex-1 justify-center self-center main-menu display-1024-none">
				<ul class="d_flex wrap c-left">
					<li class="display-none display-1024-flex">
						<a href="javascript:void(0);" onclick="menu();" title="FECHAR">
							FECHAR
						</a>
					</li>
					<li>
						<a @if(Route::getCurrentRoute()->uri() == 'home' || Route::getCurrentRoute()->uri() == '/') class="active" @endif href="{{ route('home') }}" title="HOME">
							HOME
						</a>
					</li>
					<li>
						<a @if(Route::getCurrentRoute()->uri() == 'wesa') class="active" @endif href="{{ route('about') }}" title="WESA">
							WESA 
						</a>
					</li>
					<li class="relative menu-segment">
						<a @if(Route::getCurrentRoute()->uri() == 'seguimentos' || Route::getCurrentRoute()->uri() == 'seguimentos/{seo_link}') class="active" @endif href="{{ route('segment') }}" title="SEGMENTOS">
							SEGMENTOS
						</a>
						@inject("segments","\AgenciaS3\Http\Controllers\Site\SegmentController")
						<?php $menuSegment = $segments->getSegmentActive(); ?>
						@if(!$menuSegment->isEmpty())
						<ul class="absolute top-100 left-50">
							@foreach($menuSegment as $row)
							<li>
								<a href="{{ route('segment.show', $row->seo_link) }}" title="{{ $row->name }}">
									{{ $row->name }}
								</a>
							</li>
							@endforeach
						</ul>
						@endif
					</li>
					@if(!$menuSegment->isEmpty())
						@foreach($menuSegment as $row)
						<li class="display-none menu-segment">
							<a href="{{ route('segment.show', $row->seo_link) }}" title="{{ $row->name }}">
								{{ $row->name }}
							</a>
						</li>
						@endforeach
					@endif
					<li class="relative menu-segment">
						<a @if(Route::getCurrentRoute()->uri() == 'produtos' || Route::getCurrentRoute()->uri() == 'produtos/{seo_link}' || Route::getCurrentRoute()->uri() == 'produtos/{category}/{seo_link}') class="active" @endif href="{{ route('product') }}" title="PRODUTOS">
							PRODUTOS
						</a>
						@inject("categories","\AgenciaS3\Http\Controllers\Site\ProductController")
						<?php $menuCategory = $categories->getCategoryActive(); ?>
						@if(!$menuCategory->isEmpty())
						<ul class="absolute top-100 left-50">
							@foreach($menuCategory as $row)
							<li>
								<a href="{{ route('product.category', $row->seo_link) }}" title="{{ $row->name }}">
									{{ $row->name }}
								</a>
							</li>
							@endforeach
						</ul>
						@endif
					</li>
					@if(!$menuCategory->isEmpty())
						@foreach($menuCategory as $row)
						<li class="display-none menu-segment">
							<a href="{{ route('product.category', $row->seo_link) }}" title="{{ $row->name }}">
								{{ $row->name }}
							</a>
						</li>
						@endforeach
					@endif
					<li>
						<a @if(Route::getCurrentRoute()->uri() == 'noticias' || Route::getCurrentRoute()->uri() == 'noticias/tag/{tag}' || Route::getCurrentRoute()->uri() == 'noticias/{seo_link}') class="active" @endif href="{{ route('blog') }}" title="NOTÍCIAS">
							NOTÍCIAS
						</a>
					</li>
					<li>
						<a @if(Route::getCurrentRoute()->uri() == 'contato') class="active" @endif href="{{ route('contact') }}" title="CONTATO">
							CONTATO
						</a>
					</li>
					<li class="display-none display-1024-flex">
						<a href="{{ session()->get('configuration')[4]['description'] }}" target="_blank" title="ÁREA DO CLIENTE">
							ÁREA DO CLIENTE
						</a>
					</li>
				</ul>
			</nav>
			<section class="display-none flex-1 justify-end display-1024-flex">
				<div class="flex-1 display-none action-menu display-1024-block display-1024-flex">
					<a class="flex-1 f-left" href="javascript:void(0);" onclick="menu()" title="Menu">
						<span class="smooth"></span>
						<span class="smooth"></span>
						<span class="smooth"></span>
					</a>
				</div>
			</section>
			<aside class="d_flex wrap display-1024-none">
				@if(isPost(session()->get('configuration')[4]['description']))
				<a class="self-center main-bg b-radius-50 bt smooth" target="_blank" href="{{ session()->get('configuration')[4]['description'] }}" title="Área do Cliente">
					Área do Cliente
				</a>
				@endif
				<form class="self-center m-left-20-px d_flex b-radius-50 overflow-h form-search" id="fSearch" method="get" action="{{ route('blog') }}">
					<fieldset class="flex-1">
						<input type="text" name="search" id="search-txt" placeholder="Buscar no site..." />
					</fieldset>
					<fieldset class="flex-1">
						<input class="pointer" type="submit" id="send-search" value="" />
					</fieldset>
				</form>
				@if(isPost(session()->get('configuration')[3]['description']))
				<p class="self-center m-left-20-px color-white f-w-400 f-size-16">
					{!! session()->get('configuration')[3]['description'] !!}
				</p>
				@endif
			</aside>
		</article>
	</div>
</header>
<?php if(Route::getCurrentRoute()->uri() != 'home' && Route::getCurrentRoute()->uri() != '/'){ ?><div class="w-100 false-header"></div><?php } ?>