@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(7); ?>
	@include('site.layouts._header_page', ['id' => 7, 'image' => asset('uploads/page/'.session()->get('page')[7]['banner'])])
    <!--section class="w-100 m-top-3 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-20 p-bottom-1024-30">
            <div class="center-2">
                @include('site.layouts.bread-crumbs')
                <div class="w-100 m-top-30 t-align-c contact-internal m-top-1024-0">
					<div class="display-inline-block w-700-px f-none max-w-100">
						@include('site.contact._form')
						@include('site.contact._info')
					</div>
                </div>
            </div>
        </div>
    </section-->
@endsection