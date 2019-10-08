<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/html">
<head>
    <title></title>
    <base href="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/physiomet/assets/site/css/style.css" type="text/css">

    <!-- JS -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="w-100 relative">
    <span class="fixed top-0 left-0 top-fix"></span>
    <div class="w-100 false-header"></div>
    <header class="w-100 absolute z-index-9 main-header <?php if($active != 'home'){ echo 'header-internal'; }?>">
        <section class="w-100 bg-white-1">
            <div class="center">
                <article class="w-100 d_flex container">
                    <section class="flex-1 d_flex display-600-none">
                        <div class="item d_flex">
                            <figure class="self-center">
                                <img src="/physiomet/assets/site/images/icon-email.png" title="physiomet@physiomet.com.br" alt="physiomet@physiomet.com.br" />
                            </figure>
                            <p class="self-center">
                                <a href="" title="physiomet@physiomet.com.br">
                                    physiomet@physiomet.com.br
                                </a>
                            </p>
                        </div>
                        <div class="item d_flex display-1024-none">
                            <figure class="self-center">
                                <img src="/physiomet/assets/site/images/icon-phone.png" title="(51) 3075.1500" alt="(51) 3075.1500" />
                            </figure>
                            <p class="self-center">
                                (51) 3075.1500
                            </p>
                        </div>
                        <div class="item d_flex display-1250-none">
                            <figure class="self-center">
                                <img src="/physiomet/assets/site/images/icon-address.png" title="" alt="" />
                            </figure>
                            <p class="self-center l-height-14">
                                Rua Felipe Neri 148 - 4º andar<br />
                                Auxiliadora - Porto Alegre/RS
                            </p>
                        </div>
                    </section>
                    <aside class="d_flex justify-end w-600-100">
                        <ul class="d_flex c-left display-1024-none">
                            <li>
                                <a class="h-100 d_flex justify-center" href="" title="">
                                    <figure class="self-center">
                                        <img src="/physiomet/assets/site/images/social-1.png" title="" alt="" />
                                    </figure>
                                </a>
                            </li>
                            <li>
                                <a class="h-100 d_flex justify-center" href="" title="">
                                    <figure class="self-center">
                                        <img src="/physiomet/assets/site/images/social-2.png" title="" alt="" />
                                    </figure>
                                </a>
                            </li>
                            <li>
                                <a class="h-100 d_flex justify-center" href="" title="">
                                    <figure class="self-center">
                                        <img src="/physiomet/assets/site/images/social-3.png" title="" alt="" />
                                    </figure>
                                </a>
                            </li>
                            <li>
                                <a class="h-100 d_flex justify-center" href="" title="">
                                    <figure class="self-center">
                                        <img src="/physiomet/assets/site/images/social-4.png" title="" alt="" />
                                    </figure>
                                </a>
                            </li>
                        </ul>
                        <form class="d_flex w-600-100" method="post" action="">
                            <input class="flex-1" type="text" name="txt" id="txt" value="" placeholder="Pesquisar..." />
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
                        <a class="max-w-100" href="" title="">
                            <img class="max-w-100" src="/physiomet/assets/site/images/main-logo.png" title="" alt="" />
                            <img class="max-w-100 display-none" src="/physiomet/assets/site/images/logo-footer.png" title="" alt="" />
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
                                <a class="active" href="" title="Home">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="" title="A Clínica">
                                    A Clínica
                                </a>
                            </li>
                            <li>
                                <a href="" title="Serviços">
                                    Serviços
                                </a>
                            </li>
                            <li>
                                <a href="" title="Tipos de Fisio">
                                    Tipos de Fisio
                                </a>
                            </li>
                            <li>
                                <a href="" title="Blog">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="" title="Contato">
                                    Contato
                                </a>
                            </li>
                        </ul>
                    </nav>
                </article>
            </div>
        </section>
    </header>






