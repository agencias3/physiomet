<section class="w-100 p-top-70 p-bottom-70 m-top-40 box-contact p-top-1024-30 p-bottom-1024-30 m-top-1024-30">
    <div class="center">
        <h4 class="w-100 t-align-c color-white f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
            Entre em Contato com a Wesa
        </h4>
        <div class="w-100 m-top-50 t-align-c m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
            {!! Form::open(['route' => 'contact.store', 'class' => 'display-inline-block form w-800-100', 'id' => 'fContact']) !!}
            <form class="display-inline-block form w-800-100" id="fContact" method="post" action="">
                <fieldset class="w-100">
                    <input class="w-100" type="text" id="contact-name" name="name" placeholder="Nome *"required />
                </fieldset>
                <fieldset class="w-100 m-top-30">
                    <input class="w-100 masked-phone" type="text" id="contact-phone" name="phone" placeholder="Telefone *" required />
                </fieldset>
                <fieldset class="w-100 m-top-30">
                    <input class="w-100" type="email" id="contact-email" name="email" placeholder="E-mail *" required />
                </fieldset>
                <fieldset class="w-100 m-top-40 m-top-1024-30">
                    <textarea class="w-100" id="contact-message" name="message" placeholder="Mensagem *" required></textarea>
                </fieldset>
                <fieldset class="w-100 m-top-50 m-top-1024-30 send-contact">
                    <input class="display-inline-block pointer see-more see-more-2 smooth w-600-100" type="submit" id="send-contact" value="Enviar Mensagem" />
                </fieldset>
                <div class="def-msg w-100 m-top-30 f-size-16 t-align-c"></div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
<section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
    <div class="center-2">
        <article class="w-100 d_flex w-1024-100 column-1024">
            <aside class="d_flex flex-1 flex-order-2 m-left-50-px direction-column self-center order-1024-1 w-1024-100 t-align-1024-c" data-scroll-reveal="enter right move 50px">
                <h5 class="w-100 l-height-14 color-grey f-size-30 f-w-800 f-size-1024-26 f-size-600-20">
                    Wesa Tecnologia em Software Ltda
                </h5>
                @if(isPost(session()->get('configuration')[5]['description']))
                    <div class="w-100 m-top-20 text">
                        <p>
                            {!! nl2br(session()->get('configuration')[5]['description']) !!}
                        </p>
                    </div>
                @endif
                @if(isPost(session()->get('configuration')[3]['description']))
                    <div class="w-100 m-top-30 c-left m-top-1024-20">
                        <img class="display-inline-block f-1024-n" src="{{ asset('assets/site/images/phone.png') }}" title="{{ session()->get('configuration')[3]['description'] }}" alt="{{ session()->get('configuration')[3]['description'] }}" />
                        <span class="display-inline-block m-left-15-px m-top-8 f-w-700 color-grey f-size-20 f-1024-n f-size-600-18">
                            {{ session()->get('configuration')[3]['description'] }}
                        </span>
                    </div>
                @endif
            </aside>
            @if(isPost(session()->get('configuration')[6]['description']))
                <section class="w-50 w-1024-100 order-1024-2 m-top-1024-30" data-scroll-reveal="enter left move 50px">
                    <iframe class="h-1024-350-px h-600-250-px" src="{{ session()->get('configuration')[6]['description'] }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </section>
            @endif
        </article>
    </div>
</section>