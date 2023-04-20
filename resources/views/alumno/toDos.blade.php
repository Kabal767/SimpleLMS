@extends('layouts.app')

@section('template_title')
    Create Alumno
@endsection

@section('content')

<div class="form-group">
    <strong>Dni:</strong>
    {{ $alumno->DNI }}
</div>

@endsection