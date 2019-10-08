@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(10); ?>
    @include('site.layouts._header_page', ['id' => 10, 'image' => asset('uploads/page/'.session()->get('page')[10]['banner'])])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-20 p-top-1024-30">
            @include('site.layouts.bread-crumbs')
            <div class="center-2">
				<h2 class="w-100 m-top-50 l-height-14 t-upper f-w-800 f-size-55 f-size-1024-30 m-top-1024-30 f-size-600-20">
					{!! $segment->name !!}
				</h2>
                <div class="w-100 m-top-50 d_flex content-page-2 m-top-1024-30">
                    @include('site.layouts._gallery', ['images' => $images, 'path' => 'segment'])
                    <aside class="d_flex">
                        <div class="w-100 t-align-1024-c">
                            <div class="w-100 text">
                                {!! $segment->description !!}
                            </div>
                            <div class="w-100 m-top-50 t-align-c">
                                <a class="display-inline-block b-radius-5 main-bg see-more t-upper" href="{{ route('contact') }}" title="Seja um lojista">
                                    Seja um lojista
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
			@if(!$stores->isEmpty())
			<span class="w-100 m-top-80 t-align-c color-grey f-size-20 m-top-1024-30">
				>>> As melhores localizações para <strong>{{ $segment->name }}</strong> <<<
			</span>
			@endif
        </div>
        @include('site.segment.stores')
    </section>
@endsection