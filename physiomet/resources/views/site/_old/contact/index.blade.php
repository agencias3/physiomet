@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(6); ?>
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Fale com a Wesa
            </h1>
        </div>
    </section>
    <section class="w-100 p-top-40 p-bottom-40 bg-white-1 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <div class="w-90 m-left-5 w-1024-100">
                <div class="w-100 d_flex column-600">
                    <article class="d_flex flex-1 direction-column box-contact-2 b-radius-5 t-align-c w-600-100" data-scroll-reveal="enter left move 50px">
                        <h3 class="f-left l-height-14 color-white f-size-40 f-w-800 f-size-1024-26 f-size-600-20">
                            Entre em Contato<br />
                            com a Wesa
                        </h3>
                        <div class="w-100 m-top-30 m-top-1024-20">
                            <a class="display-inline-block main-bg smooth see-more see-more-2" href="javascript:void(0);" onclick="scrollPage('.box-contact');" title="Entrar em Contato">
                                Entrar em Contato
                            </a>
                        </div>
                    </article>
                    <article class="m-left-30-px d_flex flex-1 direction-column box-contact-3 b-radius-5 t-align-c w-600-100" data-scroll-reveal="enter right move 50px">
                        <h3 class="f-left l-height-14 color-white f-size-40 f-w-800 f-size-1024-26 f-size-600-20">
                            Trabalhe com<br />
                            a Wesa
                        </h3>
                        <div class="w-100 m-top-30 m-top-1024-20">
                            <a class="display-inline-block main-bg smooth see-more see-more-2" href="{{ route('work') }}" title="Enviar Currículo">
                                Enviar Currículo
                            </a>
                        </div>
                    </article>
                </div>
                <article class="w-100 m-top-30 d_flex box-contact-1 b-radius-5 column-1024" data-scroll-reveal="enter top move 50px">
                    <section class="flex-1 d_flex justify-center">
                        <h2 class="f-left self-center color-white l-height-12 f-size-85 font-4 f-size-1024-26 f-size-600-20">
                            Seja um<br />Parceiro
                        </h2>
                    </section>
                    <aside class="m-left-30-px d_flex flex-1 w-1024-100 m-top-1024-20 t-align-1024-c">
						<div class="self-center">
							<div class="w-70 color-white text w-1024-100">
								{!! session()->get('page')[6]['description'] !!}
							</div>
							<div class="w-100 m-top-30 m-top-1024-20">
								<a class="display-inline-block main-bg smooth see-more see-more-2" href="{{ route('partner') }}" title="Tornar-se Parceiro">
									Tornar-se Parceiro
								</a>
							</div>
						</div>
                    </aside>
                </article>
            </div>
        </div>
    </section>
    @include('site.contact._form')
@endsection