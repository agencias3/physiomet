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
                        <a href="{{ route('admin.budget.index') }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Nome da Empresa: </label>
                            <span class="help-block">{{ $dados->name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Nome Contato Empresa: </label>
                            <span class="help-block">{{ $dados->contact_name }}</span>
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
                            <label class="control-label text-bold">CNPJ: </label>
                            <span class="help-block">{{ $dados->cnpj }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Isento Inscrição Estadual: </label>
                            <span class="help-block">@if($dados->state_registration == 'y') Sim @else Não @endif</span>
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
                            <label class="control-label text-bold">Endereço: </label>
                            <span class="help-block">{{ $dados->address }}</span>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Data : </label>
                            <span class="help-block">{{ date('d/m/Y h:i', strtotime($dados->created_at)) }}</span>
                        </div>
                    </div>
                </div>
                @if($dados->products)
                <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Produtos</h2>
                        </div>
                    </div>
                    <?php $cont = 0; ?>
                    @foreach($dados->products as $row)
                        <?php $cont++; ?>
                        <table class="table table-no-more table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Produto ({{ $cont }})</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Finalidade</td>
                                    <td data-title="Finalidade">{{ $row->finality }}</td>
                                </tr>
                                <tr>
                                    <td>Teperatura interna desejada</td>
                                    <td data-title="Teperatura int. desejada">{{ $row->internal_temperature }}</td>
                                </tr>
                                <tr>
                                    <td>Termperatura média de entrada do produto</td>
                                    <td data-title="Termperatura produto">{{ $row->average_temperature_inlet }}</td>
                                </tr>
                                <tr>
                                    <td>Entrada diária de produtos na câmara</td>
                                    <td data-title="Entrada diária">{{ $row->daily_entry }}</td>
                                </tr>
                                <tr>
                                    <td>Alimentação trifásica</td>
                                    <td data-title="Alimentação trifásica">{{ $row->feeding }}</td>
                                </tr>
                                <tr>
                                    <td>Comprimento</td>
                                    <td data-title="Comprimento">{{ $row->length }}</td>
                                </tr>
                                <tr>
                                    <td>Altura</td>
                                    <td data-title="Altura">{{ $row->height }}</td>
                                </tr>
                                <tr>
                                    <td>Profundidade</td>
                                    <td data-title="Profundidade">{{ $row->depth }}</td>
                                </tr>
                                <tr>
                                    <td>Núcleo isolante desejado para as paredes da câmara</td>
                                    <td data-title="Núcleo isolante">{{ $row->core }}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de orçamento</td>
                                    <td data-title="Tipo de orçamento">{{ $row->type_budget }}</td>
                                </tr>
                                <tr>
                                    <td>Comprimento da porta da câmara</td>
                                    <td data-title="Comprimento da porta">{{ $row->port_length }}</td>
                                </tr>
                                <tr>
                                    <td>Altura da porta da câmara</td>
                                    <td data-title="Altura porta da câmara">{{ $row->port_height }}</td>
                                </tr>
                                <tr>
                                    <td>Tipo da porta</td>
                                    <td data-title="Tipo da porta">{{ $row->port_type }}</td>
                                </tr>
                                <tr>
                                    <td>Informações</td>
                                    <td data-title="Informações">{{ $row->information }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                @endif

            </div>
        </section>
    </section>
@endsection
