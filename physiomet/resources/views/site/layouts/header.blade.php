<span class="fixed top-0 left-0 top-fix"></span>
<div class="w-100 false-header"></div>
<header class="w-100 absolute z-index-9 main-header <?php if($active != 'home'){ echo 'header-internal'; }?>">
    <section class="w-100 bg-white-1">
        <div class="center">
            <article class="w-100 d_flex container">
                @if(session()->get('configuration')[3]['description'] || session()->get('configuration')[4]['description'] || session()->get('configuration')[5]['description'])
                <section class="flex-1 d_flex display-600-none">
                    @if(session()->get('configuration')[3]['description'])
                    <div class="item d_flex">
                        <figure class="self-center">
                            <img src="{{ asset('assets/site/images/icon-email.png') }}" title="{{ session()->get('configuration')[3]['description'] }}" alt="{{ session()->get('configuration')[3]['description'] }}" />
                        </figure>
                        <p class="self-center">
                            <a href="mailto:{{ session()->get('configuration')[3]['description'] }}" title="{{ session()->get('configuration')[3]['description'] }}">
                                {{ session()->get('configuration')[3]['description'] }}
                            </a>
                        </p>
                    </div>
                    @endif
                    @if(session()->get('configuration')[4]['description'])
                    <div class="item d_flex display-1024-none">
                        <figure class="self-center">
                            <img src="{{ asset('assets/site/images/icon-phone.png') }}" title="{{ session()->get('configuration')[4]['description'] }}" alt="{{ session()->get('configuration')[4]['description'] }}" />
                        </figure>
                        <p class="self-center">
                            {{ session()->get('configuration')[4]['description'] }}
                        </p>
                    </div>
                    @endif
                    @if(session()->get('configuration')[5]['description'])
                    <div class="item d_flex display-1250-none">
                        <figure class="self-center">
                            <img src="{{ asset('assets/site/images/icon-address.png') }}" title="Endereço" alt="Endereço" />
                        </figure>
                        <p class="self-center l-height-14">
                            {!! nl2br(session()->get('configuration')[5]['description']) !!}
                        </p>
                    </div>
                    @endif
                </section>
                @endif
                <aside class="d_flex justify-end w-600-100">
                    @if(session()->get('configuration')[6]['description'] || session()->get('configuration')[7]['description'] || session()->get('configuration')[8]['description'] || session()->get('configuration')[9]['description'])
                    <ul class="d_flex c-left display-1024-none">
                        @if(session()->get('configuration')[6]['description'])
                        <li>
                            <a class="h-100 d_flex justify-center" href="{{ session()->get('configuration')[6]['description'] }}" target="_blank" title="Facebook">
                                <figure class="self-center">
                                    <img src="{{ asset('assets/site/images/social-1.png') }}" title="Facebook" alt="Facebook" />
                                </figure>
                            </a>
                        </li>
                        @endif
                        @if(session()->get('configuration')[7]['description'])
                        <li>
                            <a class="h-100 d_flex justify-center" href="{{ session()->get('configuration')[7]['description'] }}" target="_blank" title="WhatsApp">
                                <figure class="self-center">
                                    <img src="{{ asset('assets/site/images/social-2.png') }}" title="WhatsApp" alt="WhatsApp" />
                                </figure>
                            </a>
                        </li>
                        @endif
                        @if(session()->get('configuration')[8]['description'])
                        <li>
                            <a class="h-100 d_flex justify-center" href="{{ session()->get('configuration')[8]['description'] }}" target="_blank" title="LinkedIn">
                                <figure class="self-center">
                                    <img src="{{ asset('assets/site/images/social-3.png') }}" title="LinkedIn" alt="LinkedIn" />
                                </figure>
                            </a>
                        </li>
                        @endif
                        @if(session()->get('configuration')[9]['description'])
                        <li>
                            <a class="h-100 d_flex justify-center" href="{{ session()->get('configuration')[9]['description'] }}" target="_blank" title="Instagram">
                                <figure class="self-center">
                                    <img src="{{ asset('assets/site/images/social-4.png') }}" title="Instagram" alt="Instagram" />
                                </figure>
                            </a>
                        </li>
                        @endif
                    </ul>
                    @endif
                    <form class="d_flex w-600-100" method="get" action="{{ route('blog') }}">
                        <input class="flex-1" type="text" name="search" id="txt" value="" placeholder="Pesquisar... *" required />
                        <input type="submit" name="send" id="send" value="" />
                    </form>
                </aside>
            </article>
        </div>
    </section>
    <section class="w-100 p-top-15 p-bottom-15 bg-white">
        <div class="center">
            <article class="w-100 d_flex justify-1024-space container">
                <figure class="d_flex c-left main-logo">
                    <a class="max-w-100" href="{{ route('home') }}" title="{{ config('app.name') }}">
                        <img class="max-w-100" src="{{ asset('assets/site/images/main-logo.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
                        <img class="max-w-100 display-none" src="{{ asset('assets/site/images/logo-footer.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
                    </a>
                </figure>
                <aside class="display-none m-left-40-px display-1024-flex justify-end action-menu">
                    <a class="self-center" href="javascript:void(0);" title="Menu" onclick="menu();">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </aside>
                <nav class="d_flex flex-1 justify-end main-menu display-1024-none">
                    <ul class="c-left d_flex wrap self-center">
                        <li class="display-none display-1024-flex">
                            <a href="javascript:void(0);" title="Fechar" onclick="menu();">
                                Fechar
                            </a>
                        </li>
                        <li>
                            <a @if($ativo == 'home') class="active" @endif href="{{ route('home') }}" title="Home">
                                Home
                            </a>
                        </li>
                        <li>
                            <a @if($ativo == 'a-clinica') class="active" @endif href="{{ route('about') }}" title="A Clínica">
                                A Clínica
                            </a>
                        </li>
                        <li>
                            <a @if($ativo == 'servicos' || $ativo == 'servicos/{seo_link}') class="active" @endif href="{{ route('service') }}" title="Serviços">
                                Serviços
                            </a>
                        </li>
                        <li>
                            <a @if($ativo == 'tipos-fisio' || $ativo == 'tipos-fisio/{seo_link}') class="active" @endif href="{{ route('type') }}" title="Tipos de Fisio">
                                Tipos de Fisio
                            </a>
                        </li>
                        <li>
                            <a @if($ativo == 'blog' || $ativo == 'blog/tag/{tag}' || $ativo == 'blog/{seo_link}') class="active" @endif href="{{ route('blog') }}" title="Blog">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a @if($ativo == 'contato') class="active" @endif href="{{ route('contact') }}" title="Contato">
                                Contato
                            </a>
                        </li>
                    </ul>
                </nav>
            </article>
        </div>
    </section>
</header>