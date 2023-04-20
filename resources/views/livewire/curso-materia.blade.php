<div>

    <form wire:submit.prevent="register">


        {{$currentStep}}
        @if($currentStep == 1)
        <!-- Primer paso -->
        <div class="step-one">
            <div class="card">
                <div class="card-hader bg-secondary text-white text-center"> 1/3</div>
                <div class="card-body">
                    <div class="row">

                        <!-- Nombre -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Primer nombre </label>
                                <input type="text" class="form-control" placeholder="Introduzca primer nombre" wire:model="name">
                                <span class="text-danger"> @error ('name') {{$message}}@enderror</span>
                            </div>
                        </div>

                        <!-- Apellido -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Apellido </label>
                                <input type="text" class="form-control" placeholder="Introduzca apellido" wire:model="lastName">
                                <span class="text-danger"> @error ('lastName') {{$message}}@enderror</span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <!-- DNI -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> DNI </label>
                                <input type="text" class="form-control" placeholder="DNI" wire:model="DNI">
                                <span class="text-danger"> @error ('DNI') {{$message}}@enderror</span>
                            </div>
                        </div>

                        <!-- Género -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""> Género </label>
                                <select class="form-select" wire:model="gender">
                                    <option value="" selected> Género </option>
                                    <option value="M"> Masculino </option>
                                    <option value="F"> Femenino </option>
                                </select>
                                <span class="text-danger"> @error ('gender') {{$message}}@enderror</span>
                            </div>
                        </div>

                        <!-- Curso -->
                        <div class="col-md-3" wire:ignore>
                            <div class="form-group">
                                <label for=""> Curso </label>
                                <select class="select2" wire:model="course">
                                    <option value="" selected> Seleccionar curso </option>
                                    @foreach($cursos as $curso)                                       
                                        <option value="{{ $curso->id }}" > {{ $curso->curso }}° "{{$curso->div}}" Turno {{$curso->turno}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error ('course') {{$message}}@enderror</span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <!-- Materia -->
                        <div class="col-md-3" wire:ignore>
                            <div class="form-group">
                                <label for=""> Materia </label>
                                <select class="select2" wire:model="matters">
                                    <option value="" selected> Seleccionar Materia </option>
                                    @foreach($materias as $materia)                                       
                                        <option value="{{ $materia->id }}"> {{ $materia->Name }} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error ('matters') {{$message}}@enderror</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- BUTTONS -->
        <div class="action-buttons d-flex justify-contect-between bg-white pt-2 pb-2">


            @if($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-secondary" wire:click="decreaseStep()"> Back </button>
            @endif

                <button type="button" class="btn btn-secondary" wire:click="increaseStep()" onclick="advance()"> Next </button>

            @if($currentStep == 4)
                <button type="submit" class="btn btn-md btn-secondary"> Submit </button>
            @endif            

        </div>
        </div>        
        @endif

        <button type="button" class="btn btn-secondary" wire:click="noMatter()"> Clear </button>

    </form>

    
<!-- Script -->

<script>
    document.addEventListener('livewire:load', function(){
            $('.select2').select2();
        $('.select2').on('change', function(){
            alert(this);
            Livewire.emit('noMatter', this.value);
            $('.select2').select2();
        })
    })
</script>

</div>
