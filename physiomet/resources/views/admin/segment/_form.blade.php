@include('admin.layouts.forms._name')
@include('admin.layouts.forms._image',[
    'label' => 'Arquivo',
    'size' => 'PDF',
    'name' => 'file',
    'path' => 'segment',
    'lightBox' => false,
    'route_destroy' => route('admin.segment.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'file'])
])
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')
@include('admin.layouts.forms._seo_link')
@include('admin.layouts.forms._resume')
@include('admin.layouts.forms._description')