<div class="row">
    <div class="col-sm-12 text-right">
        <a href="{{ route('admin.product.file.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-file-pdf-o"></i> Arquivos</a>
        <a href="{{ route('admin.product.text.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-list-ul"></i> Textos</a>
        <a href="{{ route('admin.product.gallery.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-image"></i> Galeria</a>
        <a href="{{ $routeBack }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
    </div>
</div>