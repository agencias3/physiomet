@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    @inject("store", "\AgenciaS3\Http\Controllers\Site\StoreController")
    <?php $page->show(10); ?>
    @include('site.layouts._header_page', ['id' => 10, 'image' => asset('/uploads/banner/top-page-2.jpg')])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-20 p-bottom-1024-30">
            <div class="center-2">
                @include('site.layouts.bread-crumbs')
                <div class="w-80 m-left-10 w-1024-100">
                    @if($segments->isEmpty())
                        <div class="w-100 m-top-30 m-bottom-30 t-align-c f-size-20">
                            Nenhum segmento encontrado!
                        </div>
                    @else
                        @foreach($segments as $row)
                            <?php $stores = $store->getBySegment($row->id); ?>
                            @if(!$stores->isEmpty())
                            <article class="w-100 m-top-80 m-top-1024-50">
                                <div class="w-100 title-segment">
                                    <i class="w-100 h-3-px secondary-bg relative z-index-1"></i>
                                    <span class="f-left bg-white relative z-index-2">
                                        {{ $row->name }}
                                    </span>
                                </div>
                                <ul class="w-100 m-top-30 slider-slick-3 list-group list-group-gallery m-top-1024-20">
                                    @foreach($stores as $row)
                                        @include('site.store._list')
                                    @endforeach
                                </ul>
                            </article>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection