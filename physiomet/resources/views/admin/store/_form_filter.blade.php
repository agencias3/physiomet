{!! Form::open(['route' => 'admin.store.index', 'method' => 'get']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::text('name', null, ['class'=>'form-control mb-md', 'placeholder' => 'Loja']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::select('enterprise_id', $enterprises, null, ['class'=>'form-control mb-md']) !!}
        </div>
    </div>
    <div class="col-md-12 text-right">
        <a href="{{ route('admin.store.index') }}" title="Limpar" class="btn btn-danger mb-md"><i class="fa fa-trash"></i> Limpar</a>
        <button type="submit" class="btn btn-warning mb-md" value="Filtrar Dados"><i class="fa fa-search-plus"></i> Filtrar Dados</button>
    </div>
</div>
{!! Form::close() !!}