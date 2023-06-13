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
                        
                    @livewire('cursos.curso-list', ['cursos' => $cursos, 'materias' => $materias])

                </div>


            </div>
        </div>


    </div>
@endsection

<!-- Logic -->
@section('js')
    
<script>
    //This one gives format to the select2 class
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>

<!-- Select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection
