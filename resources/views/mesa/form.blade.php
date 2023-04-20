<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Proffesor') }}
            {{ Form::text('Proffesor', $mesa->Proffesor, ['class' => 'form-control' . ($errors->has('Proffesor') ? ' is-invalid' : ''), 'placeholder' => 'Proffesor']) }}
            {!! $errors->first('Proffesor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Date') }}
            {{ Form::text('Date', $mesa->Date, ['class' => 'form-control' . ($errors->has('Date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('Date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_exams') }}
            {{ Form::text('id_exams', $mesa->id_exams, ['class' => 'form-control' . ($errors->has('id_exams') ? ' is-invalid' : ''), 'placeholder' => 'Id Exams']) }}
            {!! $errors->first('id_exams', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>