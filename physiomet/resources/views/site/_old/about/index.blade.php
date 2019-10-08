@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(1); ?>
    @include('site.layouts._header_page', ['id' => 1, 'image' => asset('uploads/page/'.session()->get('page')[1]['banner'])])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-20 p-bottom-1024-30">
            <div class="center-2">
				@include('site.layouts.bread-crumbs')
				<div class="w-100 d_flex content-page-2 m-top-30 m-top-800-0">
					<div class="w-80 m-left-10 w-1024-100">
                        <aside class="d_flex">
                            <div class="w-100 t-align-1024-c">
								<h2 class="w-100 l-height-14 t-upper f-w-800 f-size-55 f-size-1024-30 f-size-600-20">
									Como surgiu o SPOT Living Mall?
								</h2>
                                <!--
                                <h2 class="w-100 m-top-30 f-w-600 color-grey f-size-20">
                                    O que é o SPOT?
                                </h2>
                                -->
                                <div class="w-100 m-top-25 text">
                                    {!! session()->get('page')[1]['description'] !!}
                                </div>
                                <!--
                                <div class="w-100 m-top-30">
                                    <a class="display-inline-block b-radius-5 secondary-bg see-more" href="{{ route('business-segments') }}" title="Segmentos de negócio">
                                        Segmentos de negócio
                                    </a>
                                </div>
                                -->
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-100 content" style="padding-top: 0;">
        <div class="w-100 p-top-80 p-bottom-80 bg-white-2 p-top-1024-20 p-bottom-1024-30">
			<div class="center">
				<h3 class="w-100 t-align-c l-height-14 t-upper main-color f-w-800 f-size-55 f-size-1024-30 f-size-600-20">
					Benefícios do spot
				</h3>
				<article class="w-100 d_flex wrap column-800">
					<div class="flex-1 m-top-40 w-800-100 m-top-1024-30">
						<span class="w-100 t-align-c t-upper f-w-300 f-size-35 f-size-1024-26 f-size-600-20">
							Para o seu cliente
						</span>
						<div class="w-100 d_flex relative wrap marker-we column-800">
							<div class="m-top-60 item-we flex-1 t-align-c m-top-1024-30">
								<figure class="w-100">
									<img class="display-inline-block max-w-100" src="{{ asset('uploads/page/we-1.png') }}" title="" alt="" />
								</figure>
								<p class="w-100 m-top-40 l-height-14 color-grey f-size-20 m-top-1024-20">
									Acessibilidade<br />
									e conveniência
								</p>
							</div>
							<div class="m-top-60 item-we flex-1 t-align-c m-top-1024-30">
								<figure class="w-100">
									<img class="display-inline-block max-w-100" src="{{ asset('uploads/page/we-2.png') }}" title="" alt="" />
								</figure>
								<p class="w-100 m-top-40 l-height-14 color-grey f-size-20 m-top-1024-20">
									Variedade<br />
									de serviços
								</p>
							</div>
						</div>
					</div>
					<div class="flex-1 m-top-40 m-top-1024-30">
						<span class="w-100 t-align-c f-w-300 t-upper f-size-35 f-size-1024-26 f-size-600-20">
							Para o seu negócio
						</span>
						<div class="w-100 d_flex wrap column-800">
							<div class="m-top-60 item-we flex-1 t-align-c m-top-1024-30">
								<figure class="w-100">
									<img class="display-inline-block max-w-100" src="{{ asset('uploads/page/we-3.png') }}" title="" alt="" />
								</figure>
								<p class="w-100 m-top-40 l-height-14 color-grey f-size-20 m-top-1024-20">
									Visibilidade<br />
									e exposição
								</p>
							</div>
							<div class="m-top-60 item-we flex-1 t-align-c m-top-1024-30">
								<figure class="w-100">
									<img class="display-inline-block max-w-100" src="{{ asset('uploads/page/we-4.png') }}" title="" alt="" />
								</figure>
								<p class="w-100 m-top-40 l-height-14 color-grey f-size-20 m-top-1024-20">
									Segurança e<br />
									organização
								</p>
							</div>
						</div>
					</div>
				</article>
			</div>
        </div>
    </section>
    <?php $page->show(13); ?>
    @if(isPost(session()->get('page')[13]['video_mp4']))
    <section class="w-100 p-top-50 p-bottom-50 secondary-bg-1 p-top-1024-30 p-bottom-1024-30">
        <div class="center-2">
            <div class="w-100 d_flex box-movie box-movie-internal column-1024">
                <section class="flex-1 d_flex w-1024-100">
                    <div class="w-100 l-height-14 t-upper f-w-300 main-color f-size-55 title-video t-align-1024-c f-size-1024-30 f-size-600-20">
                        {!! strip_tags(session()->get('page')[13]['description'], '<strong><br>') !!}
                    </div>
                </section>
                <aside class="flex-1 d_flex w-1024-100 t-align-1024-c m-top-1024-30">
                    <div class="w-100 self-center relative">
                        <video class="w-100 h-1024-auto" id="video" width="100%" height="400px">
                            <source src="{{ asset('uploads/page/'.session()->get('page')[13]['video_mp4']) }}" type="video/mp4">
                            <source src="{{ asset('uploads/page/'.session()->get('page')[13]['video_ogg']) }}" type="video/ogg">
                            Your browser does not support HTML5 video.
                        </video>
                        <a class="w-100 h-100 absolute z-index-1 top-0 left-0 bt-play" onclick="playPause()" href="javascript:void(0);" title="Play"></a>
                        <a class="absolute z-index-2 bottom-0 right-0 bt-audio display-none" onclick="audio()" href="javascript:void(0);" title="Play"></a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    @endif
    <?php $page->show(15); ?>
    @if(isPost(session()->get('page')[15]['description']))
	<section class="w-100 p-top-80 p-bottom-80 box-map p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <article class="w-100 d_flex column-1024">
                @if(isPost(session()->get('page')[15]['image']))
                <figure class="flex-1 w-1024-100 m-top-1024-30">
                    <img class="w-100" src="{{ asset('uploads/page/'.session()->get('page')[15]['image']) }}" title="{{ session()->get('page')[15]['name'] }}" alt="{{ session()->get('page')[15]['name'] }}" />
                </figure>
                @endif
                <aside class="flex-1 w-1024-100">
                    <span class="w-100 title-map t-upper f-w-800 secondary-color f-size-45 f-size-1024-26">
                        {!! session()->get('page')[15]['name'] !!}
                    </span>
                    <div class="w-100 m-top-20 list-address m-top-1024-0">
                    {!! session()->get('page')[15]['description'] !!}
                    </div>
                    <!--
                    <ul class="w-100 m-top-20 list-address m-top-1024-0">
                        <li>
                            Grand Park Eucaliptos - Rua Dona Augusta, 333
                        </li>
                        <li>
                            Baltimore - Av. Osvaldo Aranha, 1022
                        </li>
                        <li>
                            Doc Santana - Av. Princesa Isabel, 636
                        </li>
                        <li>
                            Moulin - Rua Quintino Bocaiúva, 159
                        </li>
                        <li>
                            Vida Viva Horizonte - Av. Sertório, 1201
                        </li>
                        <li>
                            Supreme Higienópolis - Av. Assis Brasil, 319
                        </li>
                        <li>
                            Anita Garibaldi - Rua Anita Garibaldi, 1143
                        </li>
                        <li>
                            Vida Viva Boulevard - Av. Aparício Borges, 1123
                        </li>
                        <li>
                            Hom João Wallig - Av. João Wallig, 620
                        </li>
                        <li>
                            Hom Nilo - Av. Nilo Peçanha, 3245
                        </li>
                        <li>
                            Nine - Av. Ipiranga, 8484
                        </li>
                        <li>
                            Icon - Av. Assis Brasil, 4500
                        </li>
                        <li>
                            Maxplaza - Av. Getúlio Vargas, 4713
                        </li>
                    </ul>
                    -->
                </aside>
            </article>
        </div>
    </section>
    @endif
	<!--
    <section class="w-100 secondary-bg-1 box-movie">

        <img class="w-100" src="{{ asset('uploads/page/video.jpg') }}" title="" alt="" />
        -->
    </section>
    <!--section class="w-100 p-top-80 p-bottom-80 d_flex content-map p-top-1024-30 p-bottom-1024-30">
        <section class="d_flex t-align-1024-c">
            <div class="w-100">
                <figure class="w-100 t-align-c">
                    <img class="display-inline-block f-left f-1024-n" src="{{ asset('assets/site/images/icons/pin-1.png') }}" title="" alt="" />
                </figure>
                <h2 class="w-100 m-top-20 l-height-14 t-upper f-w-800 color-grey f-size-50 title f-size-1024-30 f-size-600-20">
                    Clique no <strong>Spot</strong> E
                    conheça mais sobre
                    os empreendimentos
                </h2>
                <div class="w-420-px m-top-40 w-1024-100 m-top-1024-30">
                    <form class="w-100 form-filter-2" method="post" action="">
                        <label class="w-100 color-grey f-size-20" for="">
                            Estou procurando pelo empreendimento:
                        </label>
                        <div class="w-100 m-top-30 d_flex">
                            <fieldset>
                                <input class="w-100" type="text" name="" placeholder="" />
                            </fieldset>
                            <fieldset>
                                <input class="w-100 pointer" type="submit" value="" />
                            </fieldset>
                        </div>
                    </form>
                    <div class="w-100 m-top-30 t-align-c">
                        <a class="display-inline-block b-radius-5 secondary-bg see-more" href="" title="Saber mais">
                            Saber mais
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <aside class="d_flex m-top-1024-30">
            <img class="w-100" src="{{ asset('uploads/page/map.jpg') }}" title="" alt="" />
        </aside>
    </section-->
@endsection