@include('admin.layouts.forms._name_select_pluck', [
    'name' => 'category_id',
    'label' => 'Categoria',
    'required' => true,
    'select' => $categories
])
@include('admin.layouts.forms._image',[
    'label' => 'Ícone',
    'size' => '106px de altura',
    'name' => 'icon',
    'path' => 'product',
    'route_destroy' => route('admin.product.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'icon'])
])
@include('admin.layouts.forms._video')
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')
@include('admin.layouts.forms._seo_link')
@include('admin.layouts.forms._resume')
@include('admin.layouts.forms._description')