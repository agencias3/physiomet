@include('admin.layouts.forms._name_select_pluck', [
    'label' => 'Seguimento',
    'name' => 'segment_id',
    'select' => $segments
])
@include('admin.layouts.forms._active_date_datepublish')
@include('admin.layouts.forms._form_seo_keywords_description')
@include('admin.layouts.forms._description')