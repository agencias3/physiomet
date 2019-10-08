<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('store_related_id', 'Loja? *') !!}
            <select class="form-control" required="required" id="store_related_id" name="store_related_id">
                <option value="">Selecione</option>
                @foreach($stores as $row)
                    <option value="{{ $row->id }}">{{ $row->enterprise->name.' > '.$row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::hidden('store_id', $id, ['required' => 'required']) !!}
</div>
<br />