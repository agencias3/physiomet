<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('segment_id', 'Seguimento *') !!}
            <select class="form-control" required="required" id="segment_id" name="segment_id">
                <option value="">Selecione</option>
                @foreach($segments as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::hidden('store_id', $id, ['required' => 'required']) !!}
</div>
<br />