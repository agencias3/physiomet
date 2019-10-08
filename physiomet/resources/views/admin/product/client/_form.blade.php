<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('client_id', 'Cliente? *') !!}
            <select class="form-control" required="required" id="client_id" name="client_id">
                <option value="">Selecione</option>
                @foreach($clients as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::hidden('product_id', $id, ['required' => 'required']) !!}
</div>
<br />