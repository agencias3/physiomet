@include('admin.layouts.forms._name_select_pluck',[
    'required' => true,
    'label' => 'Categoria',
    'name' => 'category_id',
    'select' => $categories
])
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')
@include('admin.layouts.forms._description')
@include('admin.layouts.forms._datasheet')