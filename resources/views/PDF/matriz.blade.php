@extends('PDF.base')

@section('content')

@foreach($alumno->cursos as $curso)


<table style="width:100%">
    <tr> <th colspan="5"> <h3> {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </h3> </th></tr>
    <tr>
        <th> Materia </th>
        <th> 1er Trimestre</th>
        <th> 2do Trimestre</th>
        <th> 3er Trimestre</th>
        <th> Calificación final</th>
    </tr>
    @foreach($alumno->materias()->where('origin', $curso->id)->get() as $materia)
        <tr>
            <th> {{$materia->name}} </th>
            <td> {{$materia->pivot->quarter1}} </td>
            <td> {{$materia->pivot->quarter2}}</td>
            <td> {{$materia->pivot->quarter3}}</td>
            <td> {{$materia->pivot->callification}}</td>
        </tr>
    @endforeach
</table>

@endforeach

@endsection