@extends('layouts.app')

@section('template_title')
    Curso
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card m-4">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h4 class="mt-2">CURSOS</h4>
                            </span>

                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        
                    @livewire('cursos.curso-list', ['cursos' => $cursos])

                </div>


            </div>
        </div>
    </div>
@endsection
