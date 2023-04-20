@extends('layouts.app')

@section('template_title')
    Create Curso
@endsection

@section('css')
<!-- Select -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Curso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cursos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('curso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Logic -->
@section('js')
    
<script>
    //This is the fetch function, used to update the "Grado" input according to the slider
    function fetch()
    {
        var get = document.getElementById("grade").value;
        document.getElementById("curso").value = get;
    }

    //This one gives format to the select2 class
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>

<!-- Select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection