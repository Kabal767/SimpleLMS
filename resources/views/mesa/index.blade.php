@extends('layouts.app')

@section('template_title')
    Mesa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mesa') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mesas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Proffesor</th>
										<th>Date</th>
										<th>Id Exams</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mesas as $mesa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mesa->Proffesor }}</td>
											<td>{{ $mesa->Date }}</td>
											<td>{{ $mesa->id_exams }}</td>

                                            <td>
                                                <form action="{{ route('mesas.destroy',$mesa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mesas.show',$mesa->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('mesas.edit',$mesa->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $mesas->links() !!}
            </div>
        </div>
    </div>
@endsection
