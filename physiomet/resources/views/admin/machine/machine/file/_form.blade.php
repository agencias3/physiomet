@include('admin.layouts.forms._name')
@include('admin.layouts.forms._image',[
    'label' => 'Arquivo',
    'size' => 'PDF',
    'name' => 'file',
    'path' => 'machine/file',
    'route_destroy' => route('admin.machine.machine.file.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'file'])
])
@include('admin.layouts.forms._active_order')
{!! Form::hidden('machine_id', $machine_id, ['class'=>'form-control', 'required' => 'required', 'maxlength' => 255]) !!}
