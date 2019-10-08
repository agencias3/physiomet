@include('admin.layouts.forms._name')
@include('admin.layouts.forms._image',[
    'label' => 'Imagem',
    'size' => '106px de altura',
    'name' => 'image',
    'path' => 'product/text',
    'route_destroy' => route('admin.product.text.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
])
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._description')
{!! Form::hidden('product_id', $product_id, ['class'=>'form-control', 'required' => 'required', 'maxlength' => 255]) !!}
