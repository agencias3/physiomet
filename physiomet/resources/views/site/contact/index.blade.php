@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <section class="w-100 p-top-50 p-bottom-80 p-top-1024-15 p-bottom-1024-30">
        <div class="center">
            <div class="w-100 container w-1024-100">
                @include('site.layouts.bread-crumbs')
                <h1 class="w-100 m-top-50 t-align-c main-color f-size-26 font-3 m-top-1024-30 f-size-1024-20">
                    Entre em Contato
                </h1>
            </div>
        </div>
    </section>
    <section class="w-100 p-bottom-100 content p-bottom-1024-30">
        <div class="center">
            <div class="w-100 d_flex justify-center">
                <div class="d_flex wrap t-align-c container-contact direction-600-column">
                    @if(isPost(session()->get('configuration')[5]['description']))
                    <div class="w-50 d_flex direction-column w-600-100">
                        <figure class="w-100">
                            <img class="display-inline-block" src="{{ asset('assets/site/images/contact-1.png') }}" title="Endereço" alt="Endereço" />
                        </figure>
                        <div class="w-100 m-top-30 text">
                            <p>
                                {!! nl2br(session()->get('configuration')[5]['description']) !!}
                                @if(isPost(session()->get('configuration')[10]['description']))
                                <br />
                                CEP {!! session()->get('configuration')[10]['description'] !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    @endif
                    @if(isPost(session()->get('configuration')[3]['description']))
                    <div class="w-50 d_flex direction-column w-600-100">
                        <figure class="w-100">
                            <img class="display-inline-block" src="{{ asset('assets/site/images/contact-2.png') }}" title="E-mail" alt="E-mail" />
                        </figure>
                        <div class="w-100 m-top-30 text">
                            <p>
                                <a href="mailto:{{ session()->get('configuration')[3]['description'] }}" title="{{ session()->get('configuration')[3]['description'] }}">{{ session()->get('configuration')[3]['description'] }}</a>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if(isPost(session()->get('configuration')[11]['description']))
                    <div class="w-50 d_flex direction-column w-600-100">
                        <figure class="w-100">
                            <img class="display-inline-block" src="{{ asset('assets/site/images/contact-3.png') }}" title="WhatsApp" alt="WhatsApp" />
                        </figure>
                        <div class="w-100 m-top-30 text">
                            <p>
                                {!! nl2br(session()->get('configuration')[1]['description']) !!}
                                <br />
                                Celular/Whatsapp
                            </p>
                        </div>
                    </div>
                    @endif
                    @if(isPost(session()->get('configuration')[4]['description']))
                    <div class="w-50 d_flex direction-column w-600-100">
                        <figure class="w-100">
                            <img class="display-inline-block" src="{{ asset('assets/site/images/contact-4.png') }}" title="Telefone" alt="Telefone" />
                        </figure>
                        <div class="w-100 m-top-30 text">
                            <p>
                                {{ session()->get('configuration')[4]['description'] }}<br />
                                {{ session()->get('configuration')[12]['description'] }}
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @if(isPost(session()->get('configuration')[9]['description']) || isPost(session()->get('configuration')[6]['description']) || isPost(session()->get('configuration')[8]['description']))
            <div class="w-100 m-top-80 d_flex wrap justify-center box-social box-social-1 m-top-1024-30">
                <ul class="self-center m-right-30-px d_flex f-left c-left w-600-100 m-top-600-20 justify-600-center">
                    @if(isPost(session()->get('configuration')[9]['description']))
                    <li>
                        <a class="d_flex justify-center b-radius-100" href="{{ session()->get('configuration')[9]['description'] }}" target="_blank" title="Instagram">
                            <img class="self-center" src="{{ asset('assets/site/images/social-8.png') }}" title="Instagram" alt="Instagram" />
                        </a>
                    </li>
                    @endif
                    @if(isPost(session()->get('configuration')[6]['description']))
                    <li>
                        <a class="d_flex justify-center b-radius-100" href="{{ session()->get('configuration')[6]['description'] }}" target="_blank" title="Facebook">
                            <img class="self-center" src="{{ asset('assets/site/images/social-11.png') }}" title="Facebook" alt="Facebook" />
                        </a>
                    </li>
                    @endif
                    @if(isPost(session()->get('configuration')[8]['description']))
                    <li>
                        <a class="d_flex justify-center b-radius-100" href="{{ session()->get('configuration')[8]['description'] }}" target="_blank" title="LinkedIn">
                            <img class="self-center" src="{{ asset('assets/site/images/social-12.png') }}" title="LinkedIn" alt="LinkedIn" />
                        </a>
                    </li>
                    @endif
                </ul>
                <p class="d_flex justify-end">
                    <strong class="t-align-600-c m-right-600-0">
                        CONHEÇA NOSSAS<br />
                        REDES SOCIAIS
                    </strong>
                </p>
            </div>
            @endif
        </div>
    </section>
@endsection