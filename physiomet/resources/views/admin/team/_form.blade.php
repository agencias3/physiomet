@include('admin.layouts.forms._name')
@include('admin.layouts.forms._input_text_6_6',[
    'i_0' => [
        'label' => 'Crefito',
        'name' => 'crefito',
        'required' => false
    ],
    'i_1' => [
        'label' => 'Cargo',
        'name' => 'office',
        'required' => false
    ]
])
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '1920px X 1080px, conteúdo principal centralizado',
    'name' => 'image',
    'path' => 'team',
    'route_destroy' => route('admin.team.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])
@include('admin.layouts.forms._email')
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._description')
@include('admin.layouts.forms._complement')