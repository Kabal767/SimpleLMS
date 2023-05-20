@extends('layouts.app')

@section('template_title')
    Create Exam
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row m-5">
            <div class="col m-5">

                @includeif('partials.errors')

                <div class="card card-default m-5">
                    <div class="card-header">
                        <span class="card-title m-3">Crear exámen</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('exams.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('exam.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
