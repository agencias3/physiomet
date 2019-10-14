@inject("tips","\AgenciaS3\Http\Controllers\Site\TipController")
<?php $tipies = $tips->getActives(); ?>
@if(!$tipies->isEmpty())
<article class="w-80 m-left-10 w-1024-100">
    <h2 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
        @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
        <?php $page->show(7); ?>
        {!! session()->get('page')[7]['name']!!}
    </h2>
    <div class="w-100 m-top-30 t-align-c text m-top-1024-25" data-scroll-reveal="enter bottom move 50px">
        {!! session()->get('page')[7]['description']!!}
    </div>
    <ul class="w-80 m-top-40 m-left-10 slider-slick-1 list-group-2 w-1024-100 m-top-1024-30" data-scroll-reveal="enter bottom move 50px">
    @foreach($tipies as $row)
        <?php $items = $tips->items($row->id); ?>
        @if(!$items->isEmpty())
        <li class="f-left d_flex">
            <div class="w-100 d_flex wrap item column-600">
                @if(isPost($row->image))
                <section class="d_flex flex-1 self-center justify-center main-bg b-radius-20 c-left w-600-100">
                    <figure>
                        <img class="max-w-100" src="{{ asset('uploads/tip/'.$row->image) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                    </figure>
                </section>
                @endif
                <aside class="flex-1 self-center m-left-40-px w-600-100 m-top-600-20">
                    <ul class="w-100">
                        @foreach($items as $item)
                        <li class="w-100 d_flex direction-column justify-space">
                            <div class="w-100 d_flex justify-space title-progress">
                                <span>
                                    {{ $item->name }}
                                </span>
                                <b>
                                    {{ $item->progress }}%
                                </b>
                            </div>
                            <div class="w-100 m-top-10 progress">
                                    <span>
                                        <i style="width: {{ $item->progress }}%;"></i>
                                    </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </li>
        @endif
    @endforeach
    </ul>
</article>
@endif
