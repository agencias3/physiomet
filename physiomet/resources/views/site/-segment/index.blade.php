@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(1); ?>
    <section class="w-100 p-top-50 p-bottom-10 p-top-1024-30 p-top-1024-30 p-bottom-1024-0">
        <div class="center">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Segmentos Wesa
            </h1>
        </div>
    </section>
    <section class="w-100">
        <div class="center-2">
            @if($segments->isEmpty())
                <div class="w-100 m-top-30 m-bottom-30 t-align-c f-size-20" data-scroll-reveal="enter bottom move 50px">
                    Nenhum seguimento encontrado!
                </div>
            @else
                <?php $cont = 0; ?>
                @foreach($segments as $row)
                    <?php
                        $cont++;

                        $classImg = '';
                        $class = 'box-middle-1';
                        if($cont % 2 == 0){
                            $class = 'box-middle-2';
                            $classImg = 'm-top-800-30';
                        }

                        $cover = '';
                        $image = $row->images->firstWhere('cover', 'y');
                        if(isPost($image)){
                            $cover = asset('uploads/segment/'.$image->image);
                        }
                    ?>
            <div class="w-100 m-top-40 d_flex bg-white-1 {{ $class }} relative w-1024-100 p-top-1024-30 p-bottom-1024-30 m-top-1024-30 column-800" data-scroll-reveal="enter bottom move 50px">
                <aside class="flex-1 w-800-100 m-top-800-30 t-align-800-c order-800-2">
                    <span class="w-100 l-height-14 f-w-800 color-grey-1 f-size-40 f-size-1024-26 f-size-600-20">
                        {{ $row->name }}
                    </span>
                    <div class="w-100 m-top-20 text">
                        {!! $row->resume !!}
                    </div>
                    <div class="w-100 m-top-30 m-top-1024-20">
                        <a class="display-inline-block main-bg smooth see-more w-600-100" href="{{ route('segment.show', $row->seo_link) }}" title="Conferir Segmento">
                            Conferir Segmento
                        </a>
                    </div>
                </aside>
                @if(isPost($cover))
                <section class="d_flex flex-1 flex-order-1 justify-center bg-white b-radius-10 w-800-100 {{ $classImg }}">
                    <figure class="w-100">
                        <a class="w-100 overflow-h b-radius-10" href="{{ route('segment.show', $row->seo_link) }}" title="{{ $row->name }}">
                            <img class="w-100" src="{{ $cover }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                        </a>
                    </figure>
                </section>
                @endif
            </div>
                @endforeach
            @endif
        </div>
    </section>
    @include('site.contact._form')
@endsection