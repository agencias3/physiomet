<div class="row">
    <div class="col-sm-12 text-right">
        <a href="{{ route('admin.segment.client.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-users"></i> Clientes</a>
        <a href="{{ route('admin.segment.gallery.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-image"></i> Galeria</a>
        <a href="{{ $routeBack }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
    </div>
</div>