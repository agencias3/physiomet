@include('admin.layouts.forms._name_select_pluck',[
    'required' => true,
    'label' => 'Categoria',
    'name' => 'category_id',
    'select' => $categories
])
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '1200px x 630px',
    'name' => 'image',
    'path' => 'part/part',
    'route_destroy' => route('admin.part.part.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')