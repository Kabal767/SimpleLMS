@extends('layouts.app')

@section('template_title')
    Cerrar Examen
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">                
                
                @livewire('exams.exam-close', ['exam' => $exam])

            </div>
        </div>
    </section>
@endsection