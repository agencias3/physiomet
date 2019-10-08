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
                        <a href="{{ route('admin.partner.index') }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Razão Social:</label>
                            <span class="help-block">{{ $dados->social_reason }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Nome Fantasia:</label>
                            <span class="help-block">{{ $dados->fantasy_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">CNPJ:</label>
                            <span class="help-block">{{ $dados->cnpj }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Inscrição Estadual:</label>
                            <span class="help-block">{{ $dados->state_registration }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Endereço:</label>
                            <span class="help-block">{{ $dados->address }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Bairro:</label>
                            <span class="help-block">{{ $dados->neighborhood }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Cidade:</label>
                            <span class="help-block">{{ $dados->city }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">UF:</label>
                            <span class="help-block">{{ $dados->state }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">CEP:</label>
                            <span class="help-block">{{ $dados->zip_code }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Telefone:</label>
                            <span class="help-block">{{ $dados->phone }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Fax:</label>
                            <span class="help-block">{{ $dados->fax }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">E-mail:</label>
                            <span class="help-block">{{ $dados->email }}</span>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <h4>Dados Avançados</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Quantidade de Funcionários:</label>
                            <span class="help-block">{{ $dados->amount_employees }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Regiões de Interesse para atuação:</label>
                            <span class="help-block">{{ $dados->acting_region }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Como chegou na Wesa:</label>
                            <span class="help-block">{{ $dados->how_did_it_arrive }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-bold">Data:</label>
                            <span class="help-block">{{ date('d/m/Y h:i', strtotime($dados->created_at)) }}</span>
                        </div>
                    </div>
                </div>

                @if($dados->contacts)
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <h4>Contatos</h4>
                    </div>
                    @foreach($dados->contacts as $row)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label text-bold">Contato:</label>
                                <span class="help-block">{{ $row->contact }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label text-bold">Cargo:</label>
                                <span class="help-block">{{ $row->office }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label text-bold">Telefone:</label>
                                <span class="help-block">{{ $row->phone }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif

                @if($dados->products)
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Produtos</h4>
                        </div>
                        @foreach($dados->products as $row)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label text-bold">Produto:</label>
                                    <span class="help-block">{{ $row->product }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label text-bold">Fabricante:</label>
                                    <span class="help-block">{{ $row->manufacturer }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label text-bold">Descrição:</label>
                                    <span class="help-block">{{ $row->description }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($dados->clients)
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Clientes</h4>
                        </div>
                        @foreach($dados->clients as $row)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">Razão Social:</label>
                                    <span class="help-block">{{ $row->social_reason }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">CNPJ:</label>
                                    <span class="help-block">{{ $row->cnpj }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">Telefone:</label>
                                    <span class="help-block">{{ $row->phone }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">UF/Cidade:</label>
                                    <span class="help-block">{{ $row->state.'/'.$row->city }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($dados->providers)
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Fornecedores</h4>
                        </div>
                        @foreach($dados->providers as $row)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">Razão Social:</label>
                                    <span class="help-block">{{ $row->social_reason }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">CNPJ:</label>
                                    <span class="help-block">{{ $row->cnpj }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">Telefone:</label>
                                    <span class="help-block">{{ $row->phone }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-bold">UF/Cidade:</label>
                                    <span class="help-block">{{ $row->state.'/'.$row->city }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </section>
    </section>
@endsection
