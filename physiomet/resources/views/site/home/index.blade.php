@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    @include('site.home.banner')
    @include('site.home.about')

    <section class="w-100 p-top-40 p-bottom-100 content w-1024-100 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <ul class="w-100 m-top-100 slider-slick-4 list-group-1 m-top-1024-0">
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
            <div class="w-100 m-top-80 container w-1024-100 m-top-1024-30">
                <h2 class="w-100 title">
                    SERVIÇOS
                </h2>
            </div>
            <article class="w-100 d_flex wrap justify-center list-group-2">
                <div class="item w-600-100">
                    <a class="w-100 relative" href="">
                        <img class="w-100 relative z-index-1" src="/physiomet/uploads/page/service-1.jpg" title="" alt="" />
                        <div class="w-100 absolute z-index-2 bottom-0 left-0">
                            <div class="w-100 h-100 display-table">
                                <div class="inline">
                                    <span class="w-100">
                                        Fisioterapia
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item w-600-100">
                    <a class="w-100 relative" href="">
                        <img class="w-100 relative z-index-1" src="/physiomet/uploads/page/service-2.jpg" title="" alt="" />
                        <div class="w-100 absolute z-index-2 bottom-0 left-0">
                            <div class="w-100 h-100 display-table">
                                <div class="inline">
                                    <span class="w-100">
                                        Traumatologia
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item w-600-100">
                    <a class="w-100 relative" href="">
                        <img class="w-100 relative z-index-1" src="/physiomet/uploads/page/service-3.jpg" title="" alt="" />
                        <div class="w-100 absolute z-index-2 bottom-0 left-0">
                            <div class="w-100 h-100 display-table">
                                <div class="inline">
                                    <span class="w-100">
                                        Fonoaudiologia
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
            @include('site.home.blog')
        </div>
    </section>
@endsection