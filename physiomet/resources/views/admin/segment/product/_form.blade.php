<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('product_id', 'Produto? *') !!}
            <select class="form-control" required="required" id="client_id" name="product_id">
                <option value="">Selecione</option>
                @foreach($products as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::hidden('segment_id', $id, ['required' => 'required']) !!}
</div>
<br />