@extends('admin.layouts.app')
@section('content')
    <section role="main" class="content-body">
        @include('admin.layouts._page_header')
        <section class="panel media-gallery">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'] }}</h2>
            </header>
            <div class="panel-body">

                @include('admin.layouts._msg')
                @include('admin.modals._delete')
                @include('admin.modals._gallery')

                <?php
                $idRoute = $id;
                $routeBack = route('admin.store.edit', ['id' => $id]);
                ?>

                @include('admin.store.inc.menu')
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            Tamanho Imagem (1200px X 630px)
                        </div>
                    </div>
                </div>

                <div class="row cadImage" style="margin: 20px 0;">
                    <div class="col-sm-12 center">
                        <form>
                            <input id="file_upload" name="file_upload" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" type="file" multiple="true">
                            <div id="queue"></div>
                            <a class="mb-xs mt-xs mr-xs btn btn-danger" href="javascript:$('#file_upload').uploadifive('upload')"><i class="fa fa-image"></i> Upload Imagem</a>
                        </form>
                    </div>
                </div>
                <hr>
                @if(!$dados->isEmpty())
                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                    <ul class="sortable col-sm-12" data-route="{{ route('admin.store.gallery.order', ['id' => $id]) }}">
                        @foreach($dados as $row)
                        <li class="lisort col-sm-3 div_{{ $row->id }}" id="item_{{ $row->id }}">
                            <div class="isotope-item document">
                                <div class="thumbnail">
                                    <div class="thumb-preview">
                                        <a class="thumb-image" href="{{ asset('uploads/store/'.$row->image) }}" style="height: 221px; background: url('{{ asset('uploads/store/'.$row->image) }}') center center; -webkit-background-size: cover;background-size: cover;"></a>
                                        <div class="mg-thumb-options">
                                            <div class="mg-zoom">
                                                <i class="fa fa-search"></i>
                                            </div>
                                            <div class="mg-toolbar">
                                                <div class="mg-group pull-right">
                                                    <a href="#modalForm" data-id="{{ $row->id }}" data-route="{{ route('admin.store.gallery.updateLabel', ['id' => $row->id]) }}" class="modal-form btnEditLabel">LEGENDA</a>
                                                    <a href="#modalDestroy" data-id="{{ $row->id }}" data-route="{{ route('admin.store.gallery.destroy', ['id' => $row->id]) }}" class="modal-form excluir" data-id="<?php echo $id; ?>"><i class="fa fa-trash-o"></i> EXCLUIR</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mg-title text-semibold text-right col-md-12">
                                        CAPA
                                        <input type="checkbox" data-route="{{ route('admin.store.gallery.cover', ['id' => $row->id]) }}" <?php if($row->cover == 'y'){echo 'checked="checked"';} ?> class="cover" data-id="{{ $row->id }}" data-id-album="{{ $id }}" name="capa" />
                                    </h5>
                                    <div class="mg-description">
                                        <small class="pull-left text-muted legenda" data-id="{{ $row->id }}">{{ $row->label }}</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </section>
    </section>
@endsection
