<?php $page->show(1); ?>
<section class="w-100 p-top-100 p-top-1024-30">
    <div class="center">
        <article class="w-100 d_flex container w-1024-100 direction-1024-column">
            <section class="flex-1 d_flex direction-column w-1024-100 t-align-1024-c">
                <span class="w-100 f-size-18 secondary-color">
                    CONHEÇA-NOS
                </span>
                <h1 class="w-100 m-top-15 l-height-14 f-size-40 main-color f-size-1024-18">
                    {{ session()->get('page')[1]['name'] }}
                </h1>
                <div class="w-100">
                    <span class="display-inline-block w-120-px h-1-px m-top-25 bg-grey f-1024-n"></span>
                </div>
                <div class="w-100 m-top-20 main-color text">
                    {!! session()->get('page')[1]['description'] !!}
                </div>
            </section>
            @if(isset(session()->get('page')[1]['image']))
            <aside class="flex-1 d_flex m-left-5 w-1024-100">
                <figure class="self-center overflow-h b-radius-10 w-1024-100">
                    <img class="w-100" src="{{ asset('uploads/page/'.session()->get('page')[1]['image']) }}" title="{{ session()->get('page')[1]['name'] }}" alt="{{ session()->get('page')[1]['name'] }}" />
                </figure>
            </aside>
            @endif
        </article>
    </div>
</section>
