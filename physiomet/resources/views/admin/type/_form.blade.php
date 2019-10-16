@include('admin.layouts.forms._name')
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '107px X 107px, conteúdo principal centralizado',
    'name' => 'image',
    'path' => 'type',
    'route_destroy' => route('admin.type.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')
@include('admin.layouts.forms._description')