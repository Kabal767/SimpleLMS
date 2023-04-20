<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $exam->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('condición') }}
            {{ Form::text('condición', $exam->condición, ['class' => 'form-control' . ($errors->has('condición') ? ' is-invalid' : ''), 'placeholder' => 'Condición']) }}
            {!! $errors->first('condición', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_Materia') }}
            {{ Form::text('id_Materia', $exam->id_Materia, ['class' => 'form-control' . ($errors->has('id_Materia') ? ' is-invalid' : ''), 'placeholder' => 'Id Materia']) }}
            {!! $errors->first('id_Materia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_Curso') }}
            {{ Form::text('id_Curso', $exam->id_Curso, ['class' => 'form-control' . ($errors->has('id_Curso') ? ' is-invalid' : ''), 'placeholder' => 'Id Curso']) }}
            {!! $errors->first('id_Curso', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>