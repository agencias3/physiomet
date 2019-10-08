@extends('admin.layouts.app')
@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Home</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.home.index') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Home</span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Conteúdo do Gerenciador</h2>
            </header>
            <div class="panel-body">
                <p>Olá {{ Auth::user()->name }},<br><br>
                    Seja bem vindo ao seu gerenciador de conteúdo do site Agência S3 onde você poderá deixar sempre o seu site atualizado de forma simples e eficaz.<br>
                    Qualquer dúvida você pode entrar em contato pelo email <a href="mailto:contato@agencias3.com.br" title="contato@agencias3.com.br">contato@agencias3.com.br</a>
                </p>
            </div>
        </section>

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-info">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-info">
                                    <i class="fa fa-photo"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Banner</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.banner.desktop.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-secondary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-secondary">
                                    <i class="fa fa-institution"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Quem Somos</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.configuration.page.edit', 1) }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-success">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-success">
                                    <i class="fa fa-question"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Você Sabia?</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.tip.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-warning">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-warning">
                                    <i class="fa fa fa-users"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Clientes</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.client.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-quartenary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-quartenary">
                                    <i class="fa fa-list-alt"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Segmentos</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.segment.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-info">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-info">
                                    <i class="fa fa-mobile-phone"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Produtos</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.category.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-info">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-info">
                                    <i class="fa fa-mobile-phone"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Módulos</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.product.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-dark">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-dark">
                                    <i class="fa fa-tags"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Posts</strong>
                                        <span class="text-primary"></span>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.blog.post.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-danger">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-danger">
                                    <i class="fa fa-tag"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Tags</strong>
                                        <span class="text-primary"></span>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.blog.tag.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-primary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-primary">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Newsletter</strong>
                                        <span class="text-primary"></span>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.newsletter.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-tertiary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-tertiary">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Usuários</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.configuration.user.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <section class="panel panel-featured-left panel-featured-quartenary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-quartenary">
                                    <i class="fa fa-gears"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title"></h4>
                                    <div class="info">
                                        <strong class="amount">Configurações</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('admin.configuration.configuration.index') }}" class="text-muted text-uppercase">(Visualizar)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
@endsection
