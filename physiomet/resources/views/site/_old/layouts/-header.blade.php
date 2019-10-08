<header class="w-100">
	<div class="w-100 relative">
		<div class="center">
			<div class="w-100">
				<div class="w-100 t-align-c -display-1024-none">
					<figure class="display-inline-block c-left m-top-20 main-logo m-top-1800-10">
						<a href="{{ route('home') }}" title="{{ config('app.name') }}">
							<img src="{{ asset('assets/site/images/main-logo.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
						</a>
					</figure>
					<div class="display-inline-block w-100-px f-none m-top-20 m-left-30-px m-top-1800-10 m-left-1800-10">
						<figure class="w-100">
							<a class="display-inline-block c-left" href="@if(isPost(session()->get('configuration')[7]['description'])){{ session()->get('configuration')[7]['description'] }}@else javascript:vois(0); @endif" title="Melnick Even">
								<img src="{{ asset('assets/site/images/icons/logo-1.png') }}" title="Melnick Even" alt="Melnick Even" />
							</a>
						</figure>
						<figure class="w-100 m-top-10 m-top-1800-5">
							<a class="display-inline-block c-left" href="@if(isPost(session()->get('configuration')[8]['description'])){{ session()->get('configuration')[8]['description'] }}@else javascript:vois(0); @endif" title="Tornak">
								<img src="{{ asset('assets/site/images/icons/logo-2.png') }}" title="Tornak" alt="Tornak" />
							</a>
						</figure>
					</div>
					<a class="f-right action-menu display-none display-1024-inline-block" href="javascript:void(0);" onclick="menu()" title="Menu">
						<span class="smooth"></span>
						<span class="smooth"></span>
						<span class="smooth"></span>
					</a>
					<nav class="display-inline-block c-left m-left-50-px main-menu m-left-1800-10 display-1024-none">
						<ul>
							<li class="display-none display-1024-block">
								<a onclick="menu()" href="javascript:void(0);" title="Fechar">
									<span>
										<b>
											Fechar
										</b>
									</span>
								</a>
							</li>
							<li>
								<a href="{{ route('about') }}" title="Sobre o SPOT">
									<span>
										<b>
											Sobre o SPOT
										</b>
									</span>
								</a>
							</li>
							<i>|</i>
							<li>
								<a href="{{ route('store') }}" title="Lojas">
									<span>
										<b>
											Lojas
										</b>
									</span>
								</a>
							</li>
							<i>|</i>
							<li>
								<a href="{{ route('business-segments') }}" title="Segmentos de Negócios">
									<span>
										<b>
											Segmentos de Negócios
										</b>
									</span>
								</a>
							</li>
							<i>|</i>
							<!--
							<li>
								<a href="{{ route('blog') }}" title="Blog">
									<span>
										<b>
											Blog
										</b>
									</span>
								</a>
							</li>
							<i>|</i>
							-->
							<li>
								<a href="{{ route('faq') }}" title="FAQ">
									<span>
										<b>
											FAQ
										</b>
									</span>
								</a>
							</li>
							<i>|</i>
							<li>
								<a href="{{ route('contact') }}" title="Contato">
									<span>
										<b>
											Contato
										</b>
									</span>
								</a>
							</li>
						</ul>
					</nav>
					<div class="display-inline-block m-left-50-px links-top m-left-1800-10 w-600-100">
						<a class="main-bg w-600-50" href="{{ route('invest') }}" title="Invista Conosco">
							<div class="w-100 h-100 display-table">
								<div class="inline">
									<div class="display-inline-block">
										<img class="f-left display-1024-none" src="{{ asset('assets/site/images/icons/icon-1.png') }}" title="Invista Conosco" alt="Invista Conosco" />
										<span class="f-left">
											INVISTA<br class="display-1024-none" />
											CONOSCO
										</span>
									</div>
								</div>
							</div>
						</a>
						<a class="m-left-20-px secondary-bg m-left-1800-10 w-600-50" href="{{ route('we-buy-land') }}" title="Compramos seu terreno">
							<div class="w-100 h-100 display-table">
								<div class="inline">
									<div class="display-inline-block">
										<img class="f-left display-1024-none" src="{{ asset('assets/site/images/icons/icon-2.png') }}" title="Compramos seu terreno" alt="Compramos seu terreno" />
										<span class="f-left">
											COMPRAMOS<br class="display-1024-none" />
											SEU TERRENO
										</span>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="w-100 false-header"></div>