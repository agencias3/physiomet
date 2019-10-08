@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(1); ?>
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Somos a Wesa
            </h1>
            <div class="w-70 m-top-30 m-left-15 w-1024-100 m-top-1024-10 t-align-600-c" data-scroll-reveal="enter bottom move 50px">
                <div class="w-100 text text-3">
                    @if(isPost(session()->get('page')[1]['image']))
                    <img class="f-left b-radius-10 max-w-48" src="{{ asset('uploads/page/'.session()->get('page')[1]['image']) }}" title="{{ session()->get('page')[1]['name'] }}" alt="{{ session()->get('page')[1]['name'] }}" />
                    @endif
                    <p>
                        <h2>
                            {!! session()->get('page')[1]['name']!!}
                        </h2>
                    </p>
                    {!! session()->get('page')[1]['description']!!}
                </div>
            </div>
        </div>
    </section>
    <section class="w-100 p-top-10 p-bottom-40 bg-white-1 p-top-1024-0 p-bottom-1024-30">
        <div class="center">
            <div class="w-90 m-left-5 d_flex wrap justify-center list-group-3 list-group-4 w-1024-100">
                <?php $page->show(3); ?>
                @if(isPost(session()->get('page')[3]['description']))
                <div class="item flex-1 bg-white b-radius-10" data-scroll-reveal="enter left move 50px">
                    <div class="w-100 d_flex direction-column t-align-c">
                        <span class="w-100 f-size-600-20">
                            {!! session()->get('page')[3]['name']!!}
                        </span>
                        <div class="w-100 m-top-15 text">
                            {!! session()->get('page')[3]['description']!!}
                        </div>
                    </div>
                </div>
                @endif
                <?php $page->show(4); ?>
                @if(isPost(session()->get('page')[4]['description']))
                <div class="item flex-1 bg-white b-radius-10" data-scroll-reveal="enter bottom move 50px">
                    <div class="w-100 d_flex direction-column t-align-c">
                        <span class="w-100 f-size-600-20">
                            {!! session()->get('page')[4]['name']!!}
                        </span>
                        <div class="w-100 m-top-15 text">
                            {!! session()->get('page')[4]['description']!!}
                        </div>
                    </div>
                </div>
                @endif
                <?php $page->show(5); ?>
                @if(isPost(session()->get('page')[5]['description']))
                <div class="item flex-1 bg-white b-radius-10" data-scroll-reveal="enter right move 50px">
                    <div class="w-100 d_flex direction-column t-align-c">
                        <span class="w-100 f-size-600-20">
                            {!! session()->get('page')[5]['name']!!}
                        </span>
                        <div class="w-100 m-top-15 text">
                            {!! session()->get('page')[5]['description']!!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    @include('site.contact._form')
@endsection