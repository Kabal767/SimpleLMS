@extends('layouts.app')

@section('template_title')
    Exam
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card m-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h4>EXÁMENES</h4>
                            </span>

                            @livewire('exams.exam-form', ['cursos' => $cursos, 'materias' => $materias])

                        </div>
                    </div>

                    @livewire('exams.exam-list', ['cursos' => $cursos])

                </div>
            </div>
        </div>
    </div>
@endsection
