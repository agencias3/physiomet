<?php $ativo = Route::getCurrentRoute()->uri(); ?>
<div class="center-2">
<div class="w-80 m-left-10 w-1024-100">
	<nav class="w-100 c-left bread-crumbs">
		<ul class="w-1024-100 t-align-1024-c">
			<li class="display-inline-block f-1024-n">
				<a href="{{ route('home') }}" title="Home">
					Home
				</a>
			</li>
			<li class="display-inline-block f-1024-n">
				>
			</li>
			@if($ativo == 'contato')
			<li class="display-inline-block f-1024-n">
				<a href="{{ route('contact') }}" title="Contato">
					Contato
				</a>
			</li>
			@endif
			@if($ativo == 'faq')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('faq') }}" title="F.A.Q">
						F.A.Q
					</a>
				</li>
			@endif
			@if($ativo == 'sobre-nos')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('about') }}" title="Sobre o SPOT">
						Sobre o SPOT
					</a>
				</li>
			@endif
			@if($ativo == 'blog' || $ativo == 'blog/tag/{tag}' || $ativo == 'blog/{seo_link}')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('blog') }}" title="Blog">
						Blog
					</a>
				</li>
				@if($ativo == 'blog/tag/{tag}')
					<li class="display-inline-block f-1024-n">
						>
					</li>
					<li class="display-inline-block f-1024-n">
						<a href="{{ route('blog.tag', $tag->seo_link) }}" title="{{ $tag->name }}">
							{{ $tag->name }}
						</a>
					</li>
				@endif
				@if($ativo == 'blog/{seo_link}')
					<li class="display-inline-block f-1024-n">
						>
					</li>
					<li class="display-inline-block f-1024-n">
						<a href="{{ route('blog.show', $post->seo_link) }}" title="{{ $post->name }}">
							{{ $post->name }}
						</a>
					</li>
				@endif
			@endif
			@if($ativo == 'lojas' || $ativo == 'lojas/{enterprise}/{seo_link}')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('store') }}" title="Lojas">
						Lojas
					</a>
				</li>
				@if($ativo == 'lojas/{enterprise}/{seo_link}')
					<li class="display-inline-block f-1024-n">
						>
					</li>
					<li class="display-inline-block f-1024-n">
						<a href="{{ route('store.show', ['enterprise' => $store->enterprise->seo_link, 'seo_link' => $store->seo_link]) }}" title="{{ $store->enterprise->name }}">
							{{ $store->enterprise->name }}
						</a>
					</li>
					<li class="display-inline-block f-1024-n">
						>
					</li>
					<li class="display-inline-block f-1024-n">
						<a href="{{ route('store.show', ['enterprise' => $store->enterprise->seo_link, 'seo_link' => $store->seo_link]) }}" title="{{ $store->name }}">
							{{ $store->name }}
						</a>
					</li>
				@endif
			@endif
			@if($ativo == 'segmentos-de-negocios' || $ativo == 'segmentos-de-negocios/{seo_link}')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('business-segments') }}" title="Segmentos de Negócios">
						Segmentos de Negócios
					</a>
				</li>
				@if($ativo == 'segmentos-de-negocios/{seo_link}')
					<li class="display-inline-block f-1024-n">
						>
					</li>
					<li class="display-inline-block f-1024-n">
						<a href="{{ route('business-segments.show', $store->seo_link) }}" title="{{ $store->name }}">
							{{ $store->name }}
						</a>
					</li>
				@endif
			@endif
			@if($ativo == 'administracao')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('administration') }}" title="Administração SPOT">
						Administração SPOT
					</a>
				</li>
			@endif
			@if($ativo == 'invista-conosco')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('invest') }}" title="Invista Conosco">
						Invista Conosco
					</a>
				</li>
			@endif
			@if($ativo == 'compramos-seu-terreno')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('we-buy-land') }}" title="Compramos seu Terreno">
						Compramos seu Terreno
					</a>
				</li>
			@endif
			@if($ativo == 'seguimentos' || $ativo == 'seguimentos/{seo_link}')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('segment') }}" title="Segmentos">
						Segmentos
					</a>
				</li>
				@if($ativo == 'seguimentos/{seo_link}')
					<li class="display-inline-block f-1024-n">
						>
					</li>
					<li class="display-inline-block f-1024-n">
						<a href="{{ route('segment.show', $segment->seo_link) }}" title="{{ $segment->name }}">
							{{ $segment->name }}
						</a>
					</li>
				@endif
			@endif
			@if($ativo == 'empreendimentos' || $ativo == 'empreendimentos/{seo_link}')
				<li class="display-inline-block f-1024-n">
					<a href="{{ route('enterprise') }}" title="Empreendimentos">
						Empreendimentos
					</a>
				</li>
				@if($ativo == 'empreendimentos/{seo_link}')
					<li class="display-inline-block f-1024-n">
						>
					</li>
					<li class="display-inline-block f-1024-n">
						<a href="{{ route('enterprise.show', $enterprise->seo_link) }}" title="{{ $enterprise->name }}">
							{{ $enterprise->name }}
						</a>
					</li>
				@endif
			@endif
		</ul>
	</nav>
</div>
</div>