@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(9); ?>
    <section class="w-100 relative top-page">
		<img class="w-100 relative z-index-1 display-1024-none" src="{{ asset('uploads/banner/banner-false.png') }}" title="{{ $store->enterprise->name }}" alt="{{ $store->enterprise->name }}" />
		<div class="absolute z-index-2 top-0 left-0 w-100 h-100 p-top-1024-30 p-bottom-1024-30 relative-1024" style="background: url('{{ asset('uploads/page/'.session()->get('page')[9]['banner']) }}') no-repeat;background-size: cover;background-position: center center;">
			<div class="w-100 h-100 display-table">
				<div class="inline">
					<div class="w-100">
						<div class="center-2">
							<div class="w-80 m-left-10 w-1024-100 t-align-1024-c">
								<h1 class="w-100 l-height-14 t-upper f-w-800 color-white f-size-55 f-size-1200-40 f-size-1024-30 f-size-600-20">
									{{ $store->name }}<br />
									{{ $store->enterprise->name }}
								</h1>
								<div class="w-50 h-4-px m-top-10 main-bg m-left-1024-25"></div>
								<div class="w-100 m-top-15 color-white text">
									<p>
										{{ session()->get('page')[9]['sub_name'] }}
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-20 p-bottom-1024-30">
            @include('site.layouts.bread-crumbs')
        </div>
    </section>
    <section class="w-100 p-top-20 p-bottom-20 bg-white-2">
        <div class="center-2">
            <div class="w-100 d_flex wrap justify-center top-product">
                <section class="d_flex c-left t-align-1024-c display-1024-block">
                    <div class="d_flex display-1024-inline-block f-1024-n">
                        <figure>
                            <img src="{{ asset('assets/site/images/icons/logo-3.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
                        </figure>
                    </div>
                    <h1 class="d_flex m-left-20-px l-height-12 f-w-500 f-size-20 color-grey w-1024-auto display-1024-inline-block f-1024-n f-size-1024-16">
                        {{ $store->enterprise->name }}
                    </h1>
                </section>
                @if(isPost($store->price) || isPost($store->dimension) || isPost($store->enterprise->district))
                <aside class="c-left options d_flex justify-center m-top-1024-10">
                    @if(isPost($store->price))
                    <div class="d_flex">
                        <div class="d_flex display-1350-none">
                            <img src="{{ asset('assets/site/images/background/shadow.png') }}" title="Valor" alt="Valor" />
                        </div>
                        <div class="m-left-20-px d_flex wrap m-left-600-0">
                            <figure>
                                <img class="display-inline-block max-w-100" height="40" src="{{ asset('assets/site/images/icons/icon-3.png') }}" title="Valor" alt="Valor" />
                            </figure>
							<!--div class="f-left">
								<span class="m-left-20-px f-w-700 f-size-18 f-size-1024-16">
									R$ {{ formata_valor($store->price) }}
								</span>
							</div-->
							<div class="f-left p-left-20-px d_flex direction-column self-center">
								<b class="main-color">
									Locação
								</b>
								<span class="f-left f-w-700 f-size-18 f-size-1024-16 f-size-1500-16">
									R$ {{ formata_valor($store->price) }}
								</span>
							</div>
							@if(isPost($store->price_iptu))
							<div class="f-left p-left-20-px d_flex direction-column self-center">
								<b class="main-color">
									IPTU
								</b>
								<span class="f-left f-w-700 f-size-18 f-size-1024-16 f-size-1500-16">
									R$ {{ formata_valor($store->price_iptu) }}
								</span>
							</div>
							@endif
							@if(isPost($store->price_condominium))
							<div class="f-left p-left-20-px d_flex direction-column self-center">
								<b class="main-color">
									Condomínio
								</b>
								<span class="f-left f-w-700 f-size-18 f-size-1024-16 f-size-1500-16">
									R$ {{ formata_valor($store->price_condominium) }}
								</span>
							</div>
							@endif
                        </div>
                    </div>
                    @endif
                    @if(isPost($store->dimension))
                    <div class="d_flex">
                        <div class="d_flex display-1024-none">
                            <img src="{{ asset('assets/site/images/background/shadow.png') }}" title="Dimensão" alt="Dimensão" />
                        </div>
                        <div class="m-left-20-px d_flex m-left-600-0">
                            <figure class="d_flex">
                                <img class="display-inline-block max-w-100" height="40" src="{{ asset('assets/site/images/icons/icon-5.png') }}" title="Dimensão" alt="Dimensão" />
                            </figure>
                            <span class="m-left-20-px f-w-700 f-size-18 f-size-1500-16 f-size-1024-16">
                                {{ $store->dimension }} <b>(m2)</b>
                            </span>
                        </div>
                    </div>
                    @endif
                    @if(isPost($store->enterprise->district))
                    <div class="d_flex">
                        <div class="d_flex display-1024-none">
                            <img src="{{ asset('assets/site/images/background/shadow.png') }}" title="Bairro" alt="Bairro" />
                        </div>
                        <div class="m-left-20-px d_flex m-left-600-0">
                            <figure>
                                <img class="display-inline-block max-w-100" height="40" src="{{ asset('assets/site/images/icons/icon-4.png') }}" title="Bairro" alt="Bairro" />
                            </figure>
                            <span class="m-left-20-px f-w-700 f-size-18 f-size-1500-16 f-size-1024-16">
                                {{ $store->enterprise->district }}
                            </span>
                        </div>
                    </div>
                    @endif
                </aside>
                @endif
            </div>
        </div>
    </section>
    <div class="w-100 p-top-40 p-bottom-40 main-bg p-top-1024-30 p-bottom-1024-30">
        <div class="center-2">
            <div class="w-100 t-align-c">
                <img class="display-inline-block" src="{{ asset('assets/site/images/icons/pin-3-white.png') }}" alt="" title="" />
                <span class="display-inline-block m-top-15 m-left-20-px f-w-500 color-white f-size-20 f-size-1024-16">
                    <?php
                    $html = '';
                    if(isPost($store->enterprise->street)){
                        $html .= $store->enterprise->street;
                    }
                    if(isPost($store->enterprise->number)){
                        $html .= ', nº '.$store->enterprise->number;
                    }
                    if(isPost($store->enterprise->district)){
                        $html .= ', '.$store->enterprise->district;
                    }
                    if(isPost($store->enterprise->city)){
                        $html .= ', '.$store->enterprise->city;
                    }
                    if(isPost($store->enterprise->state)){
                        $html .= ' - '.$store->enterprise->state;
                    }
                    echo $html;
                    ?>
                </span>
            </div>
        </div>
    </div>
    <section class="w-100 m-top-3">
        <div class="w-100 p-top-50 p-bottom-20 p-top-1024-30">
            <div class="center-2">
                <div class="w-100 d_flex content-page-2">
                    @include('site.layouts._gallery', ['images' => $images, 'path' => 'store'])
                    <aside class="d_flex">
                        <div class="w-100">
                            <h2 class="w-100 f-w-700 color-grey f-size-20">
                                {{ $store->name }}
                            </h2>
                            <div class="w-100 m-top-25 text">
                                {!! $store->description !!}
                            </div>
                            <div class="w-100 m-top-25 d_flex links-page">
                                <a class="main-bg b-radius-3 smooth d_flex" href="{{ route('contact') }}" title="QUERO SER UM LOJISTA">
                                    <span>
                                        QUERO SER UM LOJISTA
                                    </span>
                                </a>
                                @if(isPost($store->file))
                                <a class="secondary-bg b-radius-3 smooth d_flex" href="{{ asset('uploads/store/'.$store->file) }}" target="_blank" title="BAIXAR PLANTA TÉCNICA">
                                    <span>
										BAIXAR <br />PLANTA TÉCNICA
                                    </span>
                                </a>
                                @endif
                            </div>
							@include('site.layouts._shareds')
                        </div>
                    </aside>
                </div>
                @if(!$relateds->isEmpty())
                <span class="w-100 m-top-80 t-align-c color-grey f-size-20 m-top-1024-30">
                    >>>   Outras lojas que você pode gostar   <<<
                </span>
                @endif
            </div>
        </div>
    </section>
    @if(!$relateds->isEmpty())
    <section class="w-100 content">
        <!--div class="w-100 p-bottom-180 main-bg p-bottom-1024-100"></div-->
        <div class="w-100 p-bottom-80 p-bottom-1024-30">
            <div class="center-2">
                <div class="w-100">
                    <ul class="w-100 slider-slick-3 list-group list-group-gallery">
                        @foreach($relateds as $related)
                            @include('site.store._list', ['row' => $related])
                        @endforeach
                    </ul>
                </div>
                <div class="w-100 m-top-50 t-align-c m-top-1024-20">
                    <a class="display-inline-block f-none b-radius-3 secondary-bg see-more see-more-2" href="{{ route('store') }}" title="Voltar para LOJAS">
                        Voltar para LOJAS
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection