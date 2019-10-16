@include('admin.layouts.forms._name')
@include('admin.layouts.forms._link')
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '68px de altura',
    'name' => 'image',
    'path' => 'covenant',
    'route_destroy' => route('admin.covenant.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])
@include('admin.layouts.forms._active_order')