@include('admin.layouts.forms._name')
@include('admin.layouts.forms._target_link')
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '1920px X 785px, conteúdo principal centralizado',
    'name' => 'image',
    'path' => 'banner',
    'route_destroy' => route('admin.banner.desktop.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])