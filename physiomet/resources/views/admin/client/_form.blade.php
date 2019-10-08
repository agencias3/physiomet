@include('admin.layouts.forms._name')
@include('admin.layouts.forms._link')
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '1920px X 1080px, conteúdo principal centralizado',
    'name' => 'image',
    'path' => 'client',
    'route_destroy' => route('admin.client.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])
@include('admin.layouts.forms._active_order')