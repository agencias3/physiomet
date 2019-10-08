@include('admin.layouts.forms._name')
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '245px X 260px, conteúdo principal centralizado',
    'name' => 'image',
    'path' => 'tip',
    'route_destroy' => route('admin.tip.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])
@include('admin.layouts.forms._active_order')
