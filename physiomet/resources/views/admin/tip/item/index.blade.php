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

                <?php
                $idRoute = $tip_id;
                $routeBack = route('admin.tip.edit', $tip_id);
                ?>
                @include('admin.tip.inc.menu')

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <div class="mb-md">
                            <a href="{{ route('admin.tip.item.create', $tip_id) }}" title="Cadastrar" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>
                </div>

                @if($dados->isEmpty())
                    <div class="text-center">
                        <h4>Nenhum registro encontrado ou cadastrado.</h4>
                    </div>
                @else
                    <table class="table table-no-more table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nome</th>
                            <th class="col-md-1 text-center">Progresso</th>
                            <th class="col-md-1 text-center">Ordem</th>
                            <th class="col-md-1 text-center">Ativo</th>
                            <th class="col-md-2 text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="#" class="text-center">{{ $row->id }}</td>
                                <td data-title="Nome">{{ $row->name }}</td>
                                <td data-title="Progresso" class="text-center">{{ $row->progress }}%</td>
                                <td data-title="Ordem" class="text-center">{{ $row->order }}</td>
                                <td data-title="Ativo" class="text-center">
                                    <div class="switch ativo switch-sm switch-success">
                                        <input type="checkbox" name="switch" data-route="{{ route('admin.tip.item.active', ['id' => $row->id]) }}" data-plugin-ios-switch @if($row->active == 'y') checked="checked" @endif />
                                    </div>
                                </td>
                                <td data-title="Ação" class="actions text-center">
                                    <a href="{{ route('admin.tip.item.edit', ['id' => $row->id]) }}" class="btn btn-default white-hover" title="Editar"><i class="fa el-icon-file-edit"></i></a>
                                     <a href="#modalDestroy" data-route="{{ route('admin.tip.item.destroy', ['id' => $row->id]) }}" class="excluir remove-row btn btn-danger white" title="Excluir">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $dados->links() !!}
                @endif
            </div>
        </section>
    </section>
@endsection
