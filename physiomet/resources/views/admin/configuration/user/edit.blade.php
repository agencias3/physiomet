@extends('admin.layouts.app')
@section('content')
    <section role="main" class="content-body">
        @include('admin.layouts._page_header')
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'].' > '.$config['action'] }}</h2>
            </header>

            {!! Form::model($dados, ['route'=>['admin.configuration.user.update', $dados->id], 'files' => true]) !!}
                <div class="panel-body">

                    @include('admin.layouts._msg')
                    <?php
                    $route_id = $dados->id;
                    $route_back = route('admin.configuration.user.index');
                    ?>
                    @include('admin.configuration.user.inc.menu')

                    @include('admin.configuration.user._form')

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
