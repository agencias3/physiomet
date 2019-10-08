    <footer class="w-100">
        <div class="w-100 p-top-70 p-bottom-70 secondary-bg-1 p-top-1024-30 p-bottom-1024-30">
            <div class="center-2">
                <article class="w-100 d_flex w-1024-100 justify-space column-1024">
                    <section class="d_flex self-center c-left">
                        <figure>
                            <a href="{{ route('home') }}" title="{{ config('app.name') }}">
                                <img src="{{ asset('assets/site/images/logo-footer.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" />
                            </a>
                        </figure>
                    </section>
                    <nav class="d_flex direction-column justify-center self-start menu-footer w-1024-100 m-top-1024-30 t-align-1024-c">
                        <span class="f-left color-white f-size-16 w-1024-100">
                            Navegue pelo site
                        </span>
                        <ul class="f-left d_flex c-left wrap w-1024-100 column-600">
                            <li>
                                <a href="{{ route('home') }}" title="Home">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product') }}" title="Produtos">
                                    Produtos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" title="Quem Somos">
                                    Quem Somos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}" title="Blog">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('segment') }}" title="Segmentos">
                                    Segmentos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" title="Contato">
                                    Contato
                                </a>
                            </li>
                            <li>
                                <a href="{{ session()->get('configuration')[4]['description'] }}" target="_blank" title="Área do Cliente">
                                    Área do Cliente
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('work') }}" title="Trabalhe Conosco">
                                    Trabalhe Conosco
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <aside class="d_flex direction-column t-align-c justify-center m-top-1024-30">
                        <figure class="w-100">
                            <img class="display-inline-block" src="{{ asset('assets/site/images/partner.png') }}" alt="Seja um parceiro Wesa" title="Seja um parceiro Wesa" />
                        </figure>
                        <p class="m-top-20 color-white f-size-16">
                            Seja um parceiro Wesa
                        </p>
                        <div class="w-100 m-top-20">
                            <a class="display-inline-block main-bg smooth see-more" href="{{ route('partner') }}" title="Parceiros">
                                Parceiros
                            </a>
                        </div>
                    </aside>
                </article>
            </div>
        </div>
        <div class="w-100 p-top-10 p-bottom-10 secondary-bg">
            <div class="center-2">
                <article class="w-100 d_flex w-1024-100 justify-space column-600 t-align-600-c">
                    <p class="f-left self-center color-white f-size-14 w-600-100">
                        Todos os Direitos Reservados
                    </p>
                    <figure class="f-left c-left w-600-100 m-top-600-10">
                        <a class="display-inline-block f-1024-n" href="https://www.agencias3.com.br" title="Agência s3">
                            <img src="{{ asset('assets/site/images/agencias3.png') }}" title="Agência s3" alt="Agência s3" />
                        </a>
                    </figure>
                </article>
            </div>
        </div>
    </footer>