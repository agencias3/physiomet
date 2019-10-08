@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(5); ?>
    @include('site.layouts._header_page', ['id' => 5, 'image' => asset('uploads/page/'.session()->get('page')[5]['banner'])])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
            <div class="center-2">
                @include('site.layouts.bread-crumbs')
                <div class="w-80 m-top-50 m-left-10 w-1024-100 m-top-1024-30 t-align-1024-c">
                    <div class="w-100 color-grey text">
                        {!! session()->get('page')[5]['description'] !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection