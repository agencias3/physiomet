@include('admin.layouts.forms._name')
@include('admin.layouts.forms._image',[
    'label' => 'Arquivo',
    'size' => 'PDF',
    'name' => 'file',
    'path' => 'product/file',
    'lightBox' => false,
    'route_destroy' => route('admin.product.file.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'file'])
])
@include('admin.layouts.forms._active_order')
{!! Form::hidden('product_id', $product_id, ['class'=>'form-control', 'required' => 'required', 'maxlength' => 255]) !!}