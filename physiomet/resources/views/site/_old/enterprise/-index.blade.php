@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(12); ?>
    @include('site.layouts._header_page', ['id' => 12])
    <section class="w-100 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-20 p-bottom-1024-20">
            @include('site.layouts.bread-crumbs')
            <div class="center">
                @if($enterprises->isEmpty())
                    <div class="w-100 m-top-80 m-bottom-30 t-align-c f-size-20">
                        Nenhum empreendimento encontrado!
                    </div>
                @else
                    <ul class="f-left w-100 m-top-1024-10 d_flex list-group">
                        @foreach($enterprises as $row)
                            @include('site.enterprise._list')
                        @endforeach
                    </ul>
                @endif
                @if(!$enterprises->isEmpty())
                    {!! $enterprises->links() !!}
                @endif
            </div>
        </div>
    </section>
@endsection