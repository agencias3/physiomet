<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('service_id', 'Serviço? *') !!}
            <select class="form-control" required="required" id="service_id" name="service_id">
                <option value="">Selecione</option>
                @foreach($services as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::hidden('post_id', $id, ['required' => 'required']) !!}
</div>
<br />