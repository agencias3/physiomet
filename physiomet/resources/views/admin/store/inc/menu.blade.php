<div class="row">
    <div class="col-sm-12 text-right">
        <a href="{{ route('admin.store.segment.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-list-alt"></i> Seguimentos</a>
        <a href="{{ route('admin.store.related.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-list-ul"></i> Relacionadas</a>
        <a href="{{ route('admin.store.gallery.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-image"></i> Galeria</a>
        <a href="{{ $routeBack }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
    </div>
</div>