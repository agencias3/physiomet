@if(isPost(session()->get('configuration')[9]['description']))
<a class="fixed z-index-9 bottom-0 right-0 m-bottom-20 m-right-20-px whats-fixed" href="{{ session()->get('configuration')[9]['description'] }}" target="_blank" title="Whatsapp">
	<img class="f-left" height="50px" src="{{ asset('assets/site/images/icons/whats.png') }}" title="Whatsapp" alt="Whatsapp" />
</a>
@endif
<div class="w-100 h-2-px main-bg"></div>
<section class="w-100">
	<div class="w-100 p-top-80 p-bottom-130 secondary-bg p-top-1024-30 p-bottom-1024-30">
        <div class="center-2">
            <!--figure class="w-100 t-align-c">
                <img class="display-inline-block" src="{{ asset('assets/site/images/icons/pin-1.png') }}" title="Como podemos lhe ajudar?" alt="Como podemos lhe ajudar?" />
            </figure-->
			@if(Route::getCurrentRoute()->uri() != 'contato')
			<h5 class="w-100 t-align-c l-height-14 t-upper f-w-800 color-white f-size-55 f-size-1024-30 f-size-600-20">
                Como podemos lhe ajudar?
            </h5>
			<div class="w-100 m-top-50 t-align-c m-top-1024-0">
			@else
			<div class="w-100 t-align-c">
			@endif
				<div class="display-inline-block w-700-px f-none max-w-100">
					@include('site.contact._form')
					@include('site.contact._info')
				</div>
            </div>
        </div>
    </div>
</section>
<footer class="w-100">
	<div class="w-100 p-top-60 p-bottom-60 p-top-1024-20 p-bottom-1024-30">
		<div class="center">
			<div class="w-100 t-align-c">
				<nav class="display-inline-block c-left menu-footer w-1024-100 t-align-c">
					<ul>
						<li>
							<a href="{{ route('about') }}" title="SOBRE O SPOT">
								SOBRE O SPOT
							</a>
						</li>
						<li>
							<a href="{{ route('about') }}" title="LOJAS">
								LOJAS
							</a>
							<ul>
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
						</li>
					</ul>
				</nav>
				<nav class="display-inline-block m-left-70-px c-left menu-footer m-left-1200-30-px w-1024-100 t-align-c">
					<ul>
						<li>
							<a href="{{ route('faq') }}" title="DÚVIDAS">
								DÚVIDAS
							</a>
						</li>
						<li>
							<a href="{{ route('contact') }}" title="CONTATO">
								CONTATO
							</a>
						</li>
					</ul>
				</nav>
				<div class="display-inline-block c-left m-left-70-px m-left-1200-30-px w-1024-100 m-top-1024-30 t-align-c">
					<div class="display-inline-block w-180-px m-left-50-px m-left-1200-30-px f-1024-n">
						<figure class="w-100 m-top-10 m-top-1024-0">
							<a class="display-inline-block f-none c-left" href="@if(isPost(session()->get('configuration')[7]['description'])){{ session()->get('configuration')[7]['description'] }}@else javascript:vois(0); @endif" title="Melnick Even">
								<img src="{{ asset('assets/site/images/icons/logo-1_g.png') }}" title="Melnick Even" alt="Melnick Even" />
							</a>
						</figure>
						<figure class="w-100 m-top-30 m-top-1200-10-px">
							<a class="display-inline-block f-none c-left" href="@if(isPost(session()->get('configuration')[8]['description'])){{ session()->get('configuration')[8]['description'] }}@else javascript:vois(0); @endif" title="Tornak">
								<img src="{{ asset('assets/site/images/icons/logo-2_g.png') }}" title="Tornak" alt="Tornak" />
							</a>
						</figure>
					</div>
				</div>
				<figure class="display-inline-block m-left-70-px logo-footer w-1024-100 m-top-1024-30">
					<a href="{{ route('home') }}" title="{{ config('app.name') }}">
						<img src="{{ asset('assets/site/images/logo-footer.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
					</a>
				</figure>
			</div>
		</div>
	</div>



<!--
	<div class="w-100 p-top-60 p-bottom-60 p-top-1024-20 p-bottom-1024-30">
		<div class="center">
			<div class="w-100 t-align-c">
				<nav class="display-inline-block c-left menu-footer w-1024-100 t-align-c">
					<ul>
						<li>
							<a href="{{ route('about') }}" title="Sobre o SPOT">
								Sobre o SPOT
							</a>
						</li>
						<li>
							<a href="{{ route('store') }}" title="Lojas">
								Lojas
							</a>
						</li>
						<li>
							<a href="{{ route('business-segments') }}" title="Segmentos">
								Segmentos
							</a>
						</li>
						<li>
							<a href="{{ route('enterprise') }}" title="Empreendimentos">
								Empreendimentos
							</a>
						</li>
						<li>
							<a href="{{ route('faq') }}" title="Dúvidas">
								Dúvidas
							</a>
						</li>
						<li>
							<a href="{{ route('contact') }}" title="Contato">
								Contato
							</a>
						</li>
						<!--
						<li>
							<a href="{{ route('blog') }}" title="Blog">
								Blog
							</a>
						</li>
						<li>
							<a href="{{ route('invest') }}" title="Invista Conosco">
								Invista Conosco
							</a>
						</li>
						<li>
							<a href="{{ route('we-buy-land') }}" title="Compramos seu Terreno">
								Compramos seu Terreno
							</a>
						</li>
					</ul>
				</nav>
				<div class="display-inline-block c-left m-left-70-px m-left-1200-30-px w-1024-100 m-top-1024-30 t-align-c">
					<figure class="display-inline-block logo-footer f-1024-n">
						<a href="{{ route('home') }}" title="{{ config('app.name') }}">
							<img src="{{ asset('assets/site/images/logo-footer.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
						</a>
					</figure>
					<div class="display-inline-block w-180-px m-left-30-px m-left-1200-30-px f-1024-n">
						<figure class="w-100 m-top-10 m-top-1024-0">
							<a class="display-inline-block f-none c-left" href="@if(isPost(session()->get('configuration')[7]['description'])){{ session()->get('configuration')[7]['description'] }}@else javascript:vois(0); @endif" title="Melnick Even">
								<img src="{{ asset('assets/site/images/icons/logo-1_g.png') }}" title="Melnick Even" alt="Melnick Even" />
							</a>
						</figure>
						<figure class="w-100 m-top-30 m-top-1200-10-px">
							<a class="display-inline-block f-none c-left" href="@if(isPost(session()->get('configuration')[8]['description'])){{ session()->get('configuration')[8]['description'] }}@else javascript:vois(0); @endif" title="Tornak">
								<img src="{{ asset('assets/site/images/icons/logo-2_g.png') }}" title="Tornak" alt="Tornak" />
							</a>
						</figure>
					</div>
				</div>
				@include('site.layouts._form_newsletter')
			</div>
		</div>
	</div>
						-->
	<div class="w-100 p-top-20 p-bottom-20 main-bg">
		<div class="center">
			<div class="w-100 t-align-c footer">
				<span class="display-inline-block color-white f-size-16">
					{{ date('Y') }}
				</span>
				<i class="display-inline-block"></i>
				<a class="display-inline-block" href="https://www.agencias3.com.br" target="_blank" title="Agência S3">
					<img class="f-left" src="{{ asset('assets/site/images/icons/agencias3.png') }}" title="Agência S3" alt="Agência S3" />
				</a>
			</div>
		</div>
	</div>
</footer>