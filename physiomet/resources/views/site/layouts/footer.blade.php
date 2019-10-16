<section class="w-100 d_flex direction-1024-column">
    <article class="w-55 main-bg w-1024-100">
        <section class="w-90 p-top-80 p-bottom-80 f-right left-contact f-1024-l max-w-1024-100 m-left-1024-5 p-top-1024-30 p-bottom-1024-30">
            <div class="w-80 container w-1024-100">
                <h4 class="w-100 color-white title">
                    FALE CONOSCO
                </h4>
                @include('site.contact._form')
                @if(isPost(session()->get('configuration')[9]['description']) || isPost(session()->get('configuration')[6]['description']) || isPost(session()->get('configuration')[7]['description']))
                <div class="w-100 m-top-50 d_flex wrap justify-center box-social m-top-1024-30 direction-600-column">
                    <p class="d_flex justify-end w-600-100 justify-600-center t-align-600-c">
                        <strong class="m-right-600-0">
                            ACOMPANHE-NOS EM<br />NOSSAS REDES SOCIAIS
                        </strong>
                    </p>
                    <ul class="self-center m-left-10-px f-left c-left d_flex w-600-100 m-top-600-20 justify-600-center">
                        @if(isPost(session()->get('configuration')[9]['description']))
                        <li class="m-left-600-0">
                            <a href="{{ session()->get('configuration')[9]['description'] }}" target="_blank" title="Instagram">
                                <img src="{{ asset('assets/site/images/social-8.png') }}" title="Instagram" alt="Instagram" />
                            </a>
                        </li>
                        @endif
                        @if(isPost(session()->get('configuration')[6]['description']))
                        <li>
                            <a href="{{ session()->get('configuration')[6]['description'] }}" target="_blank" title="Facebook">
                                <img src="{{ asset('assets/site/images/social-9.png') }}" title="Facebook" alt="Facebook" />
                            </a>
                        </li>
                        @endif
                        @if(isPost(session()->get('configuration')[7]['description']))
                        <li>
                            <a href="{{ session()->get('configuration')[7]['description'] }}" target="_blank" title="whatsapp">
                                <img src="{{ asset('assets/site/images/social-10.png') }}" title="whatsapp" alt="whatsapp" />
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
            </div>
        </section>
    </article>
    @if(isPost(session()->get('configuration')[13]['description']))
    <aside class="w-45 d_flex box-map w-1024-100">
        <?php
        $map = str_replace('<iframe src=', '<iframe class="w-100 h-1024-350-px h-600-250-px" src=', session()->get('configuration')[13]['description']);
        $map = str_replace('height="', 'height="100%', $map)
        ?>
        {!! $map !!}
    </aside>
    @endif
</section>
@include('site.layouts.covenant')
<footer class="w-100">
    <header class="w-100 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <article class="w-90 m-left-5 d_flex wrap w-1250-100 justify-center direction-1024-column">
                <section class="w-1024-100">
                    <figure class="w-100 d_flex justify-center">
                        <a href="{{ route('home') }}" title="{{ config('app.name') }}">
                            <img class="max-w-100" src="{{ asset('assets/site/images/logo-footer.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
                        </a>
                    </figure>
                    @if(isPost(session()->get('configuration')[9]['description']) || isPost(session()->get('configuration')[6]['description']) || isPost(session()->get('configuration')[7]['description']))
                    <div class="w-100 m-top-30 d_flex wrap justify-center box-social">
                        <p class="d_flex justify-end">
                            <strong>
                                ACOMPANHE-NOS EM<br />NOSSAS REDES SOCIAIS
                            </strong>
                        </p>
                        <ul class="self-center m-left-10-px f-left c-left">
                            @if(isPost(session()->get('configuration')[9]['description']))
                            <li>
                                <a href="{{ session()->get('configuration')[9]['description'] }}" target="_blank" title="Instagram">
                                    <img src="{{ asset('assets/site/images/social-5.png') }}" title="Instagram" alt="Instagram" />
                                </a>
                            </li>
                            @endif
                            @if(isPost(session()->get('configuration')[6]['description']))
                            <li>
                                <a href="{{ session()->get('configuration')[6]['description'] }}" target="_blank" title="Facebook">
                                    <img src="{{ asset('assets/site/images/social-6.png') }}" title="Facebook" alt="Facebook" />
                                </a>
                            </li>
                            @endif
                            @if(isPost(session()->get('configuration')[7]['description']))
                            <li>
                                <a href="{{ session()->get('configuration')[7]['description'] }}" target="_blank" title="whatsapp">
                                    <img src="{{ asset('assets/site/images/social-7.png') }}" title="whatsapp" alt="whatsapp" />
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </section>
                <article class="flex-1 d_flex wrap justify-center w-1024-100 m-top-1024-30 direction-1024-column t-align-1024-c">
                    <nav class="d_flex direction-column w-1024-100">
                        <span class="w-100 color-white f-size-16 font-2">
                            SITEMAP
                        </span>
                        <ul class="d_flex direction-column">
                            <li>
                                <a href="{{ route('home') }}" title="Home">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" title="A Clínica">
                                    A Clínica
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('service') }}" title="Serviços">
                                    Serviços
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('type') }}" title="Tipos de Fisio">
                                    Tipos de Fisio
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}" title="Blog">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" title="Contato">
                                    Contato
                                </a>
                            </li>
                        </ul>
                    </nav>
                    @if(isPost(session()->get('configuration')[7]['description']) || isPost(session()->get('configuration')[6]['description']) || isPost(session()->get('configuration')[9]['description']))
                    <nav class="d_flex direction-column m-left-60-px m-left-1250-20-px m-top-1024-30">
                        <span class="w-100 color-white f-size-16 font-2">
                            LINKS ÚTEIS
                        </span>
                        <ul class="d_flex direction-column">
                            @if(isPost(session()->get('configuration')[7]['description']))
                            <li>
                                <a href="{{ session()->get('configuration')[7]['description'] }}" target="_blank" title="Fale pelo Whatsapp">
                                    Fale pelo Whatsapp
                                </a>
                            </li>
                            @endif
                            @if(isPost(session()->get('configuration')[6]['description']))
                            <li>
                                <a href="{{ session()->get('configuration')[6]['description'] }}" target="_blank" title="Facebook">
                                    Facebook
                                </a>
                            </li>
                            @endif
                            @if(isPost(session()->get('configuration')[9]['description']))
                            <li>
                                <a href="{{ session()->get('configuration')[9]['description'] }}" target="_blank" title="Instagram">
                                    Instagram
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    @endif
                </article>
                <aside class="d_flex direction-column w-1024-100 m-top-1024-30 t-align-1024-c">
                    @include('site.newsletter._form')
                    <div class="w-100 m-top-20 text text-3">
                        <p>
                            @if(isPost(session()->get('configuration')[5]['description']))
                                {!! nl2br(session()->get('configuration')[5]['description']) !!}
                            @endif
                            @if(isPost(session()->get('configuration')[10]['description']))
                                <br />
                                CEP {!! nl2br(session()->get('configuration')[10]['description']) !!}
                            @endif
                            @if(isPost(session()->get('configuration')[12]['description']))
                                <br />
                                Funcionamento: {!! nl2br(session()->get('configuration')[12]['description']) !!}
                            @endif
                            @if(isPost(session()->get('configuration')[4]['description']))
                                <br />
                                {!! nl2br(session()->get('configuration')[4]['description']) !!}
                            @endif
                            @if(isPost(session()->get('configuration')[11]['description']))
                                \ {!! nl2br(session()->get('configuration')[11]['description']) !!}
                            @endif
                            @if(isPost(session()->get('configuration')[3]['description']))
                            <br />
                            <a href="mailto:{{ session()->get('configuration')[3]['description'] }}" title="{{ session()->get('configuration')[3]['description'] }}">{{ session()->get('configuration')[3]['description'] }}</a>
                            @endif
                        </p>
                    </div>
                </aside>
            </article>
        </div>
    </header>
    <footer class="w-100 p-top-15 p-bottom-15">
        <div class="center">
            <article class="w-90 m-left-5 d_flex wrap justify-space w-1250-100 justify-600-center">
                @if(isPost(session()->get('configuration')[4]['description']))
                <section class="d_flex c-left w-600-100 justify-600-center">
                    <figure>
                        <img src="{{ asset('assets/site/images/icon-phone-2.png') }}" title="Telefone" alt="Telefone" />
                    </figure>
                    <span class="m-left-15-px self-center d_flex direction-column">
                        <b>
                            FALE CONOSCO
                        </b>
                        <b>
                            {{ session()->get('configuration')[4]['description'] }}
                        </b>
                    </span>
                </section>
                @endif
                <p class="self-center m-top-600-20">
                    Todos os Direitos Reservados | <a href="https://www.agencias3.com.br" title="AGÊNCIA S3" target="_blank">AGÊNCIA S3</a>
                </p>
            </article>
        </div>
    </footer>
</footer>