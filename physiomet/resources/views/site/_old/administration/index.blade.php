@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(4); ?>
    @include('site.layouts._header_page', ['id' => 4, 'image' => asset('uploads/banner/top-page-3.jpg')])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-50">
            <div class="center-2">
                @include('site.layouts.bread-crumbs')
                <div class="w-80 m-top-50 m-left-10">
                    <div class="w-100 color-grey text">
                        {!! session()->get('page')[4]['description'] !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection