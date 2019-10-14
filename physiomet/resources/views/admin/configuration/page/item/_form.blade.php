@include('admin.layouts.forms._name')
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._description')
{!! Form::hidden('page_id', $page_id, ['required', true]) !!}