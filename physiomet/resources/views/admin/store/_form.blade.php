@include('admin.layouts.forms._name_select_pluck', [
    'required' => true,
    'name' => 'enterprise_id',
    'label' => 'Empreendimento',
    'select' => $enterprises
])
@include('admin.layouts.forms._input_text_6_6', [
     'i_0' => [
        'label' => 'Valor de aluguel R$',
        'name' => 'price',
        'required' => false,
        'class' => 'dinheiro'
    ],
    'i_1' => [
        'label' => 'Valor de IPTU R$',
        'name' => 'price_iptu',
        'required' => false,
        'class' => 'dinheiro'
    ]
])
@include('admin.layouts.forms._input_text_6_6', [
     'i_0' => [
        'label' => 'Valor de condomínio R$',
        'name' => 'price_condominium',
        'required' => false,
        'class' => 'dinheiro'
    ],
    'i_1' => [
        'label' => 'Dimensão (m²)',
        'name' => 'dimension',
        'class' => 'decimal',
        'required' => false
    ]
])
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tag', 'Tag *') !!}
            {!! Form::select('tag', ['none' => 'Não definido', 'rent' => 'Alugado', 'last_units' => 'Últimas Unidades'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    @include('admin.layouts.forms._image',[
        'label' => 'Planta Técnica',
        'size' => 'PDF',
        'name' => 'file',
        'path' => 'store',
        'merge' => true,
        'route_destroy' => route('admin.store.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'file'])
    ])
</div>
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')
@include('admin.layouts.forms._seo_link')
@include('admin.layouts.forms._description')