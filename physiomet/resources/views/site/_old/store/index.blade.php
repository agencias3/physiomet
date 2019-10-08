@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(8); ?>
    @include('site.layouts._header_page', ['id' => 8, 'image' => asset('uploads/page/'.session()->get('page')[8]['banner'])])
	@include('site.store._form_search', ['call' => true])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-20 p-bottom-1024-20">
            @include('site.layouts.bread-crumbs')
            <div class="center">
                @if($search)
                    <div class="w-100 t-align-c f-size-20 m-top-30 m-bottom-30 color-black" data-scroll-reveal="enter bottom move 80px">
                        Foram encontrado(s) "<strong class="f-w-600 color-black">{{ $stores->total() }}</strong>" lojas pelos filtros.
                    </div>
                @endif
                @if($stores->isEmpty())
                    <div class="w-100 m-top-80 m-bottom-30 t-align-c f-size-20">
                        Nenhuma loja encontrada!
                    </div>
                @else
                <ul class="f-left w-100 m-top-1024-10 d_flex list-group">
                    @foreach($stores as $row)
                        @include('site.store._list')
                    @endforeach
                </ul>
                @endif
                @if(!$stores->isEmpty())
                    {!! $stores->links() !!}
                @endif
            </div>
        </div>
    </section>
@endsection