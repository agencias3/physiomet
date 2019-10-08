<section class="w-100 relative">
    <article class="w-100 m-top-60 m-bottom-60 bg-white-1 m-top-1024-50 m-bottom-1024-0">
        <div class="center-2">
            <article class="w-90 m-left-5 box-segment d_flex w-1500-100 column-800">
                <aside class="p-top-50 p-bottom-50 relative d_flex flex-order-2 direction-column p-top-1024-30 p-bottom-1024-30 t-align-800-c" data-scroll-reveal="enter right move 50px">
                    <?php $page->show(2); ?>
                    <h1 class="w-100 color-grey f-size-50 font-4 f-size-1024-26">
                        {{ session()->get('page')[2]['name'] }}
                    </h1>
                    <div class="w-100 m-top-30 text text-2 m-top-1024-25">
                       {!! session()->get('page')[2]['description'] !!}
                    </div>
                    @if(!$segments->isEmpty())
                        <div class="w-100 m-top-10 m-top-600-0">
                            <?php $cont = 0; ?>
                            @foreach($segments as $row)
                                <?php $cont++; ?>
                                <a class="display-inline-block m-top-20 @if($cont > 1) m-left-20-px @endif main-bg smooth see-more see-more-2 w-600-100" href="{{ route('segment.show', $row->seo_link) }}" title="{{ $row->name }}">
                                    {{ $row->name }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </aside>
                @if(isPost(session()->get('page')[2]['image']))
                <section class="d_flex flex-order-1 m-bottom-800-0 w-800-100 justify-800-center" data-scroll-reveal="enter left move 50px">
                    <figure class="w-100 self-center">
                        <img class="w-100" src="{{ asset('uploads/page/'.session()->get('page')[2]['image']) }}" title="{{ session()->get('page')[2]['name'] }}" alt="{{ session()->get('page')[2]['name'] }}" />
                    </figure>
                </section>
                @endif
            </article>
        </div>
    </article>
</section>