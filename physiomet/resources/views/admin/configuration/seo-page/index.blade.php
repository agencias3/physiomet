@extends('admin.layouts.app')
@section('content')
    <section role="main" class="content-body">
        @include('admin.layouts._page_header')
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'] }}</h2>
            </header>
            <div class="panel-body">

                @include('admin.layouts._msg')
                @include('admin.modals._delete')

                @if(Auth::user()->id == 1)
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <div class="mb-md">
                                <a href="{{ route('admin.configuration.seo-page.create') }}" title="Cadastrar" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if($dados->isEmpty())
                    <div class="text-center">
                        <h4>Nenhum registro encontrado ou cadastrado.</h4>
                    </div>
                @else
                    <table class="table table-no-more table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Página</th>
                            <th class="col-md-2 text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="#" class="text-center">{{ $row->id }}</td>
                                <td data-title="Página">{{ $row->name }}</td>
                                <td data-title="Ação" class="actions text-center">
                                    <a href="{{ route('admin.configuration.seo-page.edit', ['id' => $row->id]) }}" class="btn btn-default white-hover" title="Editar"><i class="fa el-icon-file-edit"></i></a>
                                    @if(Auth::user()->id == 1)
                                    <a href="#modalDestroy" data-route="{{ route('admin.configuration.seo-page.destroy', ['id' => $row->id]) }}" class="excluir remove-row btn btn-danger white" title="Excluir">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {!! $dados->links() !!}
            </div>
        </section>
    </section>
@endsection
