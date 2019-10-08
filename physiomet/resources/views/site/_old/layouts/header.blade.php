<header class="w-100">
	<div class="center-2">
		<div class="w-100 d_flex justify-1024-space">
			<figure class="flex-1 c-left d_flex justify-center main-logo">
				<a class="max-w-100" href="{{ route('home') }}" title="{{ config('app.name') }}">
					<img class="max-w-100" src="{{ asset('assets/site/images/main-logo.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
				</a>
			</figure>
			<nav class="flex-1 c-left d_flex justify-center main-menu display-1024-none">
				<ul>
					<li class="display-none display-1024-block">
						<a href="javascript:void(0);" onclick="menu()" title="Fechar">
							<span>
								<b>
									Fechar
								</b>
							</span>
						</a>
					</li>
					<li>
						<a href="{{ route('about') }}" title="Sobre o spot">
							<span>
								<b>
									Sobre o spot
								</b>
							</span>
						</a>
					</li>
					<li>
						<a href="{{ route('store') }}" title="Lojas">
							<span>
								<b>
									Lojas
								</b>
							</span>
							<i>
								&#9660;
							</i>
						</a>
						<nav>
							<ul class="b-radius-10">
								<li>
									<a href="{{ route('store') }}" title="Ver todas as lojas">
										Ver todas as lojas
									</a>
								</li>
								<li>
									<a href="{{ route('segment') }}" title="Ver lojas por segmento">
										Ver lojas por segmento
									</a>
								</li>
								<li>
									<a href="{{ route('enterprise') }}" title="Ver lojas por empreendimento">
										Ver lojas por empreendimento
									</a>
								</li>
							</ul>
						</nav>
					</li>
					<li class="display-none display-1024-block main-bg-1">
						<a href="{{ route('store') }}" title="Ver todas as lojas">
							<span>
								<b>
									Ver todas as lojas
								</b>
							</span>
						</a>
					</li>
					<li class="display-none display-1024-block main-bg-1">
						<a href="{{ route('segment') }}" title="Ver lojas por segmento">
							<span>
								<b>
									Ver lojas por segmento
								</b>
							</span>
						</a>
					</li>
					<li class="display-none display-1024-block main-bg-1">
						<a href="{{ route('enterprise') }}" title="Ver lojas por empreendimento">
							<span>
								<b>
									Ver lojas por empreendimento
								</b>
							</span>
						</a>
					</li>
					<li>
						<a href="{{ route('faq') }}" title="Dúvidas">
							<span>
								<b>
									dúvidas
								</b>
							</span>
						</a>
					</li>
					<li class="bt-contact">
						<a href="{{ route('contact') }}" title="Contato">
							<span>
								<b>
									Contato
								</b>
							</span>
						</a>
					</li>
					<li class="display-none display-1024-block">
						<a href="{{ route('we-buy-land') }}" title="Outras Oportunidades de Negócio">
							<span>
								<b>
									Outras Oportunidades de Negócio
								</b>
							</span>
						</a>
					</li>
					<li class="display-none display-1024-block main-bg-1">
						<a href="{{ route('invest') }}" title="Invista conosco">
							<span>
								<b>
									Invista conosco
								</b>
							</span>
						</a>
					</li>
					<li class="display-none display-1024-block main-bg-1">
						<a href="{{ route('we-buy-land') }}" title="Compramos seu terreno">
							<span>
								<b>
									Compramos seu terreno
								</b>
							</span>
						</a>
					</li>
				</ul>
			</nav>
			<aside class="flex-1 links-top display-1024-none">
				<a class="b-radius-10" href="{{ route('invest') }}" title="Invista conosco">
					<div class="w-100 h-100 display-table">
						<div class="inline">
							<div class="w-100 t-align-c">
								<span class="display-inline-block">
									INVISTA CONOSCO
								</span>
							</div>
						</div>
					</div>
				</a>
				<a class="b-radius-10 m-left-20-px m-left-1800-10 w-600-50" href="{{ route('we-buy-land') }}" title="Compramos seu terreno">
					<div class="w-100 h-100 display-table">
						<div class="inline">
							<div class="w-100 t-align-c">
								<span class="display-inline-block">
									COMPRAMOS<br class="display-1024-none" />
									SEU TERRENO
								</span>
							</div>
						</div>
					</div>
				</a>
			</aside>
			<!--aside class="flex-1 d_flex relative display-1024-none bx-opportunity">
				<a class="flex-1 d_flex justify-center main-bg b-radius-10 bt-opportunity smooth" href="{{ route('we-buy-land') }}" title="Outras oportunidades de Negócio">
					<span class="t-align-r">
						Outras oportunidades<br />
						de Negócio
					</span>
					<b class="m-top-8 m-left-20-px">
						&#9660;
					</b>
				</a>
				<a class="flex-1 d_flex justify-center main-bg b-radius-10 bt-opportunity smooth" href="{{ route('we-buy-land') }}" title="Oportunidades de Negócio">
					Outras oportunidades<br />
					de Negócio
				</a>
				<nav class="menu-right absolute top-100 right-0 display-none">
					<ul class="w-100">
						<li class="w-100">
							<a class="w-100" href="{{ route('invest') }}" title="Invista conosco">
								Invista conosco
							</a>
						</li>
						<li class="w-100">
							<a class="w-100" href="{{ route('we-buy-land') }}" title="Compramos seu terreno">
								Compramos seu terreno
							</a>
						</li>
					</ul>
				</nav>
			</aside-->
			<div class="flex-1 justify-end display-none action-menu display-1024-block display-1024-flex">
				<a class="flex-1 f-left" href="javascript:void(0);" onclick="menu()" title="Menu">
					<span class="smooth"></span>
					<span class="smooth"></span>
					<span class="smooth"></span>
				</a>
			</div>
		</div>
	</div>
</header>
<div class="w-100 false-header"></div>