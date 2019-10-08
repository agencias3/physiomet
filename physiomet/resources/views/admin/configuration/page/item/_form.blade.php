@include('admin.layouts.forms._name')
@include('admin.layouts.forms._active_order')
{!! Form::hidden('page_id', $page_id, ['required', true]) !!}