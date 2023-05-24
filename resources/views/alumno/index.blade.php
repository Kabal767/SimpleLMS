@extends('layouts.app')

@section('template_title')
    Alumno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Alumno') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('alumnos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Dni</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Tel</th>
										<th>Dirección</th>
										<th>Birthplace</th>
										<th>Origin</th>
										<th>Nation</th>
										<th>Id Curso</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $alumno->DNI }}</td>
											<td>{{ $alumno->name }}</td>
											<td>{{ $alumno->lastName }}</td>
											<td>{{ $alumno->tel }}</td>
											<td>{{ $alumno->direction }}</td>
											<td>{{ $alumno->birthPlace }}</td>
											<td>{{ $alumno->origin }}</td>
											<td>{{ $alumno->nation }}</td>
											<td>{{ $alumno->id_Curso }}</td>

                                            <td>
                                                <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('alumnos.show',$alumno->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('alumnos.edit',$alumno->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $alumnos->links() !!}
            </div>
        </div>
    </div>
@endsection
