@include('admin.layouts.forms._name_select_pluck', [
    'label' => 'Tag',
    'name' => 'tag',
    'required' => true,
    'select' => ['none' => 'Não definido', 'rent' => 'Alugado', 'last_units' => 'Últimas Unidades']
])
@include('admin.layouts.forms._group_address_text')
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')
@include('admin.layouts.forms._seo_link')
@include('admin.layouts.forms._description')