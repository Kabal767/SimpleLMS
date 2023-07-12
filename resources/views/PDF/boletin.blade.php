@extends('PDF.base')

@section('style')
    <style>
        table{
            border: 5px solid black;
        }
        h1{
            writing-mode: vertical-lr;
            display: inline;
        }
    </style>
@endsection

@section('content')

<h1> UNGA BUNGA ESTO TIENE QUE ESTAR VERTICAL </h1>

<table style="width:100% writing-mode: vertical-rl">
    <tr>
        <th colspan="{{$materias->count() + 12}}"> ALUMNO: Apellidos y Nombres: {{$alumno->lastName}} {{$alumno->name}}</th>
    </tr>
    <tr>
        <th> Espacios curriculares </th>
        @foreach($materias as $materia)
        <td> {{$materia->name}} </td>
        @endforeach
    </tr>
</table>

@endsection