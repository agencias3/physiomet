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

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <div class="mb-md">
                            <a href="{{ route('admin.store.create') }}" title="Cadastrar" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>
                </div>

                @include('admin.store._form_filter')

                @inject("store", "\AgenciaS3\Http\Controllers\Site\StoreController")
                <?php
                $minPrice = $store->getByMinPrice();
                $maxPrice = $store->getByMaxPrice();
                $minDimension = $store->getByMinDimension();
                $maxDimension = $store->getByMaxDimension();
                ?>
                @if(isPost($minPrice) || isPost($maxPrice) || isPost($minDimension) || isPost($maxDimension))
                    <div class="alert alert-warning">
                        @if(isPost($minPrice))
                        Preço Mínimo: R$ {{ formata_valor($minPrice) }} | <a href="{{ route('admin.store.edit', session()->get('minPrice')['id']) }}">Visualizar</a><br />
                        @endif
                        @if(isPost($maxPrice))
                        Preço Máximo: R$ {{ formata_valor($maxPrice) }} | <a href="{{ route('admin.store.edit', session()->get('maxPrice')['id']) }}">Visualizar</a><br />
                        @endif
                        @if(isPost($minDimension))
                        Dimensão Mínima: {{ $minDimension }} m² | <a href="{{ route('admin.store.edit', session()->get('minDimension')['id']) }}">Visualizar</a><br />
                        @endif
                        @if(isPost($maxDimension))
                        Dimensão Máxima: {{ $maxDimension }} m² | <a href="{{ route('admin.store.edit', session()->get('maxDimension')['id']) }}">Visualizar</a>
                        @endif
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
                            <th>Nome</th>
                            <th>Empreendimento</th>
                            <th>Tag</th>
                            <th class="col-md-1 text-center">Ordem</th>
                            <th class="col-md-1 text-center">Ativo</th>
                            <th class="col-md-2 text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="#" class="text-center">{{ $row->id }}</td>
                                <td data-title="Nome">{{ $row->name}}</td>
                                <td data-title="Empreendimento">@if(isset($row->enterprise_id)){{ $row->enterprise->name }}@endif</td>
                                <td data-title="Tag">
                                    @if($row->tag == 'rent')
                                        Alugado
                                    @elseif($row->tag == 'last_units')
                                        Últimas Unidades
                                    @else
                                        Não definido
                                    @endif
                                </td>
                                <td data-title="Ordem" class="text-center">{{ $row->order }}</td>
                                <td data-title="Ativo" class="text-center">
                                    <div class="switch ativo switch-sm switch-success">
                                        <input type="checkbox" name="switch" data-route="{{ route('admin.store.active', ['id' => $row->id]) }}" data-plugin-ios-switch @if($row->active == 'y') checked="checked" @endif />
                                    </div>
                                </td>
                                <td data-title="Ação" class="actions text-center">
                                    <a href="{{ route('admin.store.segment.index', ['id' => $row->id]) }}" class="btn btn-default white-hover" title="Seguimentos"><i class="fa fa-list-alt"></i></a>
                                    <a href="{{ route('admin.store.related.index', ['id' => $row->id]) }}" class="btn btn-default white-hover" title="Relacionados"><i class="fa fa-list-ul"></i></a>
                                    <a href="{{ route('admin.store.gallery.index', ['id' => $row->id]) }}" class="btn btn-default white-hover" title="Galeria"><i class="fa fa-image"></i></a>
                                    <a href="{{ route('admin.store.edit', ['id' => $row->id]) }}" class="btn btn-default white-hover" title="Editar"><i class="fa el-icon-file-edit"></i></a>
                                    <a href="#modalDestroy" data-route="{{ route('admin.store.destroy', ['id' => $row->id]) }}" class="excluir remove-row btn btn-danger white" title="Excluir">
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
