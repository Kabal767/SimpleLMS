<div>

    <div class="row m-3">
        <h4> EVENTOS </h4>
    </div>

    <div class="row m-3">
        <div class="input-group">
            <span class="input-group-text"> Después de: </span>
            <input type="date" class="form-control" wire:model="afterDate">
            <span class="input-group-text"> Antes de: </span>
            <input type="date" class="form-control" wire:model="beforeDate">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newEvent" @if($alumno->condition != 'Cursando') disabled @endif>
                Nuevo Evento
            </button>
        </div>
    </div>

    <!-- TABLA DE EVENTOS-->
    <div class="table-responsive">
        <table class="table align-middle" width="90%">
            <thead>
                <tr>
                    <th scope="col" colspan="1"> Usuario </th>
                    <th scope="col" colspan="1"> Descripción </th>
                    <th scope="col" colspan="1"> Tipo </th>
                    <th scope="col" colspan="1"> Fecha </th>
                    <th scope="col" colspan="1"> Hora </th>
                    <th scope="col" colspan="1"> Archivo </th>
                    <th scope="col" colspan="2"> Acciones </th>
                </tr>
            </thead>
            <tbody>
                @if($events->count())
                    @foreach($events as $event)
                    <tr align-middle>
                        <td> {{$event->user}} </td>
                        <td style="word-break: break-all"> {{$event->description}} </td>
                        <td> {{$event->type}} </td>
                        <td> {{$event->date}} </td>
                        <td> {{$event->hour}} </td>
                        <td> 
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#image{{$event->id}}" @if($event->file == NULL) disabled @endif>
                                Archivo
                            </button> 
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modify{{$event->id}}" @if($alumno->condition != 'Cursando') disabled @endif>
                                Modificar
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('alumnos.eraseEvento', [$alumno->DNI,$event->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" @if($alumno->condition != 'Cursando') disabled @endif> Borrar </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else         
                <tr>           
                    <td colspan="6"><h4> Sin resultados </h4></td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    
    <!--MAINMODAL-->
    <div wire:ignore class="modal fade" id="newEvent" tabindex="-1" aria-labelledby="newEventLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form method="POST" action="{{ route('alumnos.addEvento', $alumno->DNI) }}"  role="form" enctype="multipart/form-data">
            @csrf
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Registrar evento al alumno {{$alumno->name}} {{$alumno->lastName}} </h1>
                </div>

                <div class="modal-body">
                    <div class="row m-3">
                        <div class="input-group ">
                            <span class="input-group-text"> Usuario </span>
                            <input type="text" class="form-control" name="user" id="user" value="{{ Auth::user()->name }}" readonly>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="input-group">
                            <span class="input-group-text"> Descripción </span>
                            <textarea class="form-control" name="description" id="description" rows="6" wrap="hard"></textarea>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="input-group">
                            <span class="input-group-text"> Fecha </span>
                            <input type="date" class="form-control" name="date" id="date">
                            <span class="input-group-text"> Hora </span>
                            <input type="time" class="form-control" name="hour" id="hour">
                            <span class="input-group-text"> Tipo </span>
                            <select class="form-select" name="type" id="type">
                                <option selected> Tipo de evento </option>
                                <option value="Falta de Conducta"> Falta de Conducta </option>
                                <option value="Retiro"> Retiro </option>
                                <option value="Inasistencia"> Inasistencia </option>
                            </select>
                        </div>
                    </div>

                    <div class="row m-3">                    
                        <div class="input-group">                        
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"> Registrar evento </button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <!--MODIFICACIÓN MODAL-->
    @foreach($alumno->eventos as $evento)
    <div  wire:ignore class="modal fade" id="modify{{$evento->id}}" tabindex="-1" aria-labelledby="modify{{$evento->id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{$evento->id}}
                <form method="POST" action="{{ route('alumnos.updateEvento', [$alumno->DNI,$evento->id]) }}"  role="form" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> Registrar evento al alumno {{$alumno->name}} {{$alumno->lastName}} </h1>
                    </div>

                    <div class="modal-body">
                        <div class="row m-3">
                            <div class="input-group ">
                                <span class="input-group-text"> Usuario </span>
                                <input type="text" class="form-control" name="user" id="user" value="{{$evento->user}}" readonly>
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="input-group">
                                <span class="input-group-text"> Descripción </span>
                                <textarea class="form-control" name="description" id="description" rows="6" value="{{$evento->description}}"></textarea>
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="input-group">
                                <span class="input-group-text"> Fecha </span>
                                <input type="date" class="form-control" name="date" id="date" value="{{$evento->date}}">
                                <span class="input-group-text"> Hora </span>
                                <input type="time" class="form-control" name="hour" id="hour" value="{{$evento->hour}}">
                                <span class="input-group-text"> Tipo </span>
                                <input type="string" class="form-control" name="type" id="type" value="{{$evento->type}}" readonly>
                            </div>
                        </div>

                        <div class="row m-3">                    
                            <div class="input-group">                        
                                <input type="file" class="form-control" id="file" value="{{$evento->file}}">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit"> Registrar evento </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--IMAGE MODAL-->
    <div wire:ignore class="modal fade" id="image{{$evento->id}}" ria-labelledby="image{{$evento->id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row m-3">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> Archivo del evento N°{{$evento->id}} </h1>
                    </div>
                </div>
                <div class="col align-self-center m-3">
                    <img src="{{asset('storage/'.$evento->file)}}">
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>