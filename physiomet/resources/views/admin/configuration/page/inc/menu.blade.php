@if($idRoute == 1 || $idRoute == 14)
<div class="row">
    <div class="col-sm-12 text-right">
        @if($idRoute == 80)
        <a href="{{ route('admin.configuration.page.gallery.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-image"></i> Galeria</a>
        @endif
        @if($idRoute == 14)
            <a href="{{ route('admin.configuration.page.item.index', ['id' => $idRoute]) }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-list-ul"></i> Itens</a>
        @endif
        <a href="{{ $routeBack }}" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
    </div>
</div>
@endif