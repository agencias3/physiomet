<section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
    <div class="center">
        <article class="w-90 m-left-5 d_flex w-1024-100 column-1024">
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