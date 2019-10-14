@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <section class="w-100 p-top-100 p-bottom-100 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <ul class="w-80 m-left-10 slider-slick-1-2 w-1024-100">
                <li class="f-left d_flex direction-column justify-center t-align-c">
                    <span class="w-100 f-size-18 secondary-color">
                        CONHEÇA-NOS
                    </span>
                    <div class="w-100 m-top-15 l-height-14 f-size-40 main-color f-size-1024-18">
                        <?php $page->show(1); ?>
                        {{ session()->get('page')[1]['name'] }}
                    </div>
                    <span class="display-inline-block w-120-px h-1-px f-none m-top-20 bg-grey"></span>
                    <div class="w-100 m-top-25 main-color text">
                        {!! session()->get('page')[1]['description'] !!}
                    </div>
                </li>
                <?php $items = $page->items(1); ?>
                @if(!$items->isEmpty())
                    @foreach($items as $row)
                    <li class="f-left d_flex direction-column t-align-c">
                        <div class="w-100 m-top-15 l-height-14 f-size-40 main-color f-size-1024-18">
                            {{ $row->name }}
                        </div>
                        <span class="display-inline-block w-120-px h-1-px f-none m-top-20 bg-grey"></span>
                        <div class="w-100 m-top-25 main-color text">
                            {!! $row->description !!}
                        </div>
                    </li>
                    @endforeach
                @endif
            </ul>
            <ul class="w-100 m-top-50 slider-slick-4 list-group-1 m-top-1024-30">
                <li class="f-left">
                    <a class="d_flex w-100 h-100 direction-column justify-center bg-white b-radius-20" href="" title="">
                        <figure class="self-center">
                            <img class="f-left" src="/physiomet/uploads/page/service-1.png" title="" alt="" />
                        </figure>
                        <span class="m-top-25 main-color f-size-22">
                            Fisioterapia
                        </span>
                    </a>
                </li>
                <li class="f-left">
                    <a class="d_flex w-100 h-100 direction-column justify-center bg-white b-radius-20" href="" title="">
                        <figure class="self-center">
                            <img class="f-left" src="/physiomet/uploads/page/service-2.png" title="" alt="" />
                        </figure>
                        <span class="m-top-25 main-color f-size-22">
                            Fisioterapia
                        </span>
                    </a>
                </li>
                <li class="f-left">
                    <a class="d_flex w-100 h-100 direction-column justify-center bg-white b-radius-20" href="" title="">
                        <figure class="self-center">
                            <img class="f-left" src="/physiomet/uploads/page/service-1.png" title="" alt="" />
                        </figure>
                        <span class="m-top-25 main-color f-size-22">
                            Fisioterapia
                        </span>
                    </a>
                </li>
                <li class="f-left">
                    <a class="d_flex w-100 h-100 direction-column justify-center bg-white b-radius-20" href="" title="">
                        <figure class="self-center">
                            <img class="f-left" src="/physiomet/uploads/page/service-3.png" title="" alt="" />
                        </figure>
                        <span class="m-top-25 main-color f-size-22">
                            Fisioterapia
                        </span>
                    </a>
                </li>
                <li class="f-left">
                    <a class="d_flex w-100 h-100 direction-column justify-center bg-white b-radius-20" href="" title="">
                        <figure class="self-center">
                            <img class="f-left" src="/physiomet/uploads/page/service-4.png" title="" alt="" />
                        </figure>
                        <span class="m-top-25 main-color f-size-22">
                            Fisioterapia
                        </span>
                    </a>
                </li>
                <li class="f-left">
                    <a class="d_flex w-100 h-100 direction-column justify-center bg-white b-radius-20" href="" title="">
                        <figure class="self-center">
                            <img class="f-left" src="/physiomet/uploads/page/service-3.png" title="" alt="" />
                        </figure>
                        <span class="m-top-25 main-color f-size-22">
                            Fisioterapia
                        </span>
                    </a>
                </li>
            </ul>
            @include('site.about.team')
        </div>
    </section>
    <?php $images = $page->images(1); ?>
    @if(!$images->isEmpty())
    <section class="w-100 p-bottom-100 content p-bottom-1024-15">
        <div class="center-2">
            <h2 class="w-100 l-height-14 t-align-c f-size-40 main-color f-size-1024-20">
                Galeria de Imagens
            </h2>
            <article class="w-100 m-top-30 d_flex wrap justify-center list-group-6 m-top-1024-10">
                @foreach($images as $row)
                    <?php $image = asset('uploads/page/'.$row->image); ?>
                <div class="d_flex item w-600-100">
                    <a class="w-100 h-100 html5lightbox" data-group="images" href="{{ $image }}" title="{{ $row->label }}">
                        <figure class="w-100 h-100" style="background: url('{{ $image }}') no-repeat;background-size: cover;background-position: center center;">
                            <img class="w-100 opacity-0" src="{{ $image }}" title="{{ $row->label }}" alt="{{ $row->label }}" />
                        </figure>
                    </a>
                </div>
                @endforeach
            </article>
        </div>
    </section>
    @endif
@endsection