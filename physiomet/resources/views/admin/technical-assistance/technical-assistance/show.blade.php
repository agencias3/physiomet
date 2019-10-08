@extends('admin.layouts.app')
@section('content')
    <section role="main" class="content-body">
        @include('admin.layouts._page_header')
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'] }}</h2>
            </header>
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('admin.technical-assistance.technical-assistance.index') }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Número da nota fiscal: </label>
                            <span class="help-block">{{ $dados->note_number }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">CNPJ: </label>
                            <span class="help-block">{{ $dados->cnpj }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Razão Social: </label>
                            <span class="help-block">{{ $dados->social_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Nome da empresa: </label>
                            <span class="help-block">{{ $dados->name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">E-mail: </label>
                            <span class="help-block">{{ $dados->email }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Endereço da empresa: </label>
                            <span class="help-block">{{ $dados->address }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">CEP: </label>
                            <span class="help-block">{{ $dados->zip_code }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Estado: </label>
                            <span class="help-block">{{ $dados->state }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Cidade: </label>
                            <span class="help-block">{{ $dados->city }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Telefone: </label>
                            <span class="help-block">{{ $dados->phone }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Fax: </label>
                            <span class="help-block">{{ $dados->fax }}</span>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <h3>Informações referente ao item constante da NF informada.</h3>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Data da instalação: </label>
                            <span class="help-block">{{ mysql_to_data($dados->date) }}</span>
                        </div>
                    </div>
                    @if(isset($dados->typeProduct->name))
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Tipo de produto: </label>
                            <span class="help-block">{{ $dados->typeProduct->name }}</span>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Código do produto: </label>
                            <span class="help-block">{{ $dados->code_product }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Ordem de produção: </label>
                            <span class="help-block">{{ $dados->production_order }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Número de série: </label>
                            <span class="help-block">{{ $dados->serial_number }}</span>
                        </div>
                    </div>
                    @if(isset($dados->fluid->name))
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Fluído refrigerante: </label>
                            <span class="help-block">{{ $dados->fluid->name }}</span>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Data: </label>
                            <span class="help-block">{{ date('d/m/Y h:i', strtotime($dados->created_at)) }}</span>
                        </div>
                    </div>
                </div>
                @if(isset($dados->products))
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <h3>Produtos</h3>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-no-more table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Componente</th>
                                    <th>Quantidade</th>
                                    <th>Defeito</th>
                                    <th class="text-center">Imagem/Arquivo</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($dados->products as $row)
                                <tr>
                                    <td data-title="Componente">{{ $row->component->name }}</td>
                                    <td data-title="Quantidade">{{ $row->quantity }}</td>
                                    <td data-title="Defeito">{{ $row->defect->name }}</td>
                                    <td data-title="Imagem/Arquivo" class="text-center">
                                        <a href="{{ asset('uploads/technical-assistance/'.$row->file) }}" target="_blank">Visualizar Arquivo</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </section>
@endsection
