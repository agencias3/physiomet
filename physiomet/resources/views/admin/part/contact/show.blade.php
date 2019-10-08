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
                        <a href="{{ route('admin.part.contact.index') }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
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
                            <label class="control-label text-bold">Nome do contato da empresa: </label>
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
                            <label class="control-label text-bold">Endereço da Empresa: </label>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label text-bold">Mensagem: </label>
                            <span class="help-block">{{ $dados->message }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
