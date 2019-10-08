@include('admin.layouts.forms._input_text_6_6', [
     'i_0' => [
        'label' => 'Nome',
        'name' => 'name',
        'required' => true
    ],
    'i_1' => [
        'label' => 'Progresso (Somente números) *',
        'name' => 'progress',
        'required' => true
    ]
])
@include('admin.layouts.forms._active_order')
{!! Form::hidden('tip_id', $tip_id, ['class'=>'form-control', 'required' => 'required', 'maxlength' => 255]) !!}
