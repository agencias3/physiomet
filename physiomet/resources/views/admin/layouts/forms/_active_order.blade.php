<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('active', 'Ativo? *') !!}
            {!! Form::select('active', ['y' => 'Sim', 'n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('order', 'Ordem *') !!}
            {!! Form::text('order', null, ['class'=>'form-control', 'required' => 'required', 'maxlength' => 10, 'pattern' => '[0-9]+$']) !!}
        </div>
    </div>
</div>