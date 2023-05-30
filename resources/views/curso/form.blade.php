<div class="box box-info padding-1">
    <div class="box-body">

        <form method="POST" action="{{ route('cursos.store') }}">
            @csrf

            <!-- First row of inputs -->
            <div class="row items-center gx-5">

                <!-- Grado, división y turno. Input group-->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">

                    <!-- Grado display -->
                    <input id="curso" name="curso" type="text" class="form-control" placeholder="Grado" value="3" aria-label="Username" readonly required>

                    <!-- Divisor grado-división -->
                    <span class="input-group-text">° </span>

                    <!-- División display -->
                    <input id="div" name="div" type="text" 
                    class="form-control @error('div') is-invalid @enderror" placeholder="División" aria-label="División" 
                    value="{{ old('div') }}" required>

                    <!-- Turno división -->
                    <span class="input-group-text"> Turno: </span>

                    <!-- Turno select -->
                    <select id="turno" name="turno" 
                    class="custom-select @error('turno') is-invalid @enderror" aria-label="Turno select" required>
                        <option value="Mañana" selected> Mañana </option>
                        <option value="Tarde"> Tarde </option>
                        <option value="Noche"> Noche </option>
                    </select>

                    </div>
                </div>

            </div>

            <!-- Grado slider -->
            <div class="col-3">
                <input type="range" class="form-range" min="1" max="5" id="grade" name="grade" value="{{ old('grade') }}" onchange="fetch()" required>
            </div>

            <!-- Second Row, Materias -->
            <div class="row items-center gy-5">
                <div class="form-group">
                    <label for="materias"> Materias </label>
                    <select name="materias[]" id="materias" 
                    class="select2"
                    data-style="btn-primary" title="Seleccionar Materias" multiple aria-label="materia select" required> 
                        @foreach ($materias as $materia)
                            <option value="{{ $materia->id }}"> {{ $materia->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
        
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
</div>

