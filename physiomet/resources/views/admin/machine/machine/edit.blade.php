@extends('admin.layouts.app')
@section('content')
    <section role="main" class="content-body">
        @include('admin.layouts._page_header')
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'].' > '.$config['action'] }}</h2>
            </header>
            {!! Form::model($dados, ['route'=>['admin.machine.machine.update', $dados->id], 'files' => true]) !!}
                <div class="panel-body">

                    @include('admin.layouts._msg')

                    <?php
                    $idRoute = $dados->id;
                    $routeBack = route('admin.machine.machine.index');
                    ?>

                    @include('admin.machine.machine.inc.menu')
                    @include('admin.machine.machine._form')

                </div>
                <footer class="panel-footer text-right">
                    <button type="submit"
                            class="btn btn-raised btn-success waves-effect waves-light">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Salvar Alteração
                    </button>
                </footer>
            {!! Form::close() !!}
        </section>
    </section>
@endsection
