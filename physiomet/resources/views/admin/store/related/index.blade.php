@extends('admin.layouts.app')
@section('content')
    <section role="main" class="content-body">
        @include('admin.layouts._page_header')
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'].' > '.$config['action'] }}</h2>
            </header>

            {!! Form::open(['route'=>'admin.store.related.store', 'files'=> true]) !!}
                <div class="panel-body">

                    @include('admin.layouts._msg')
                    @include('admin.modals._delete')

                    <?php
                    $idRoute = $id;
                    $routeBack = route('admin.store.edit', ['id' => $id]);
                    ?>

                    @include('admin.store.inc.menu')

                    @include('admin.store.related._form')

                </div>
                <footer class="panel-footer text-right">
                    <button type="submit" class="btn btn-raised btn-success waves-effect waves-light">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Adicionar
                    </button>
                </footer>
            {!! Form::close() !!}
        </section>

        @if(!$dados->isEmpty())
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Relacionados</h2>
            </header>
            <div class="panel-body">
                <table class="table table-no-more table-bordered table-striped mb-0">
                    <thead>
                    <tr>
                        <th>Loja</th>
                        <th class="col-md-2 text-center">Ativo</th>
                        <th class="col-md-2 text-center">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dados as $row)
                        <tr>
                            <td data-title="Loja">{{ $row->related->enterprise->name.' > '.$row->related->name }}</td>
                            <td data-title="Ativo" class="text-center"><i class="fa  @if($row->related->enterprise->active == 'y') fa-check-square alert-success @else fa-times-circle alert-danger @endif"></i></td>
                            <td data-title="Ação" class="actions text-center">
                                <a href="#modalDestroy" data-route="{{ route('admin.store.related.destroy', ['id' => $row->id]) }}" class="excluir remove-row btn btn-danger white" title="Excluir">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        @endif
    </section>
@endsection
