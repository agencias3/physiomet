@include('admin.layouts.forms._name')
@include('admin.layouts.forms._target_link')
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '1920px X 1080px, conteúdo principal centralizado',
    'name' => 'image',
    'path' => 'banner-mobile',
    'route_destroy' => route('admin.banner.mobile.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])