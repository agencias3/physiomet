@include('admin.layouts.forms._name')
@include('admin.layouts.forms._image',[
    'label' => 'Ícone',
    'size' => '106px de altura',
    'name' => 'icon',
    'path' => 'category',
    'route_destroy' => route('admin.category.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'icon'])
])
@include('admin.layouts.forms._active_order')
@include('admin.layouts.forms._seo_keywords_description')
@include('admin.layouts.forms._seo_link')
@include('admin.layouts.forms._resume')
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('datasheet', 'Ficha Técnica') !!}
            {!! Form::textarea('datasheet', null, ['class'=>'form-control ckeditor']) !!}
        </div>
    </div>
</div>
@include('admin.layouts.forms._description')