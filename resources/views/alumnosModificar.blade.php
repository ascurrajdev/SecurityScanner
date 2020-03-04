@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modificar</div>

                <div class="card-body">
                    <form method="POST" action="{{url('alumno',$alumno['id'])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="id">#ID</label>
                        <input class="form-control" type="number" name="id" id="id" value="{{$alumno['id']}}">
                        </div>
                        <div class="form-group">
                            <label for="id">Cedula</label>
                            <input class="form-control" type="number" name="cedula" id="cedula"  value="{{$alumno['cedula']}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre"  value="{{$alumno['nombre']}}">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido"  value="{{$alumno['apellido']}}">
                        </div>
                        <div class="form-group">
                            <label for="curso">Curso</label><br/>
                            @if($alumno['curso'] == 1)
                                <input type="radio" name="curso" value="1" id="primero" checked><label for="primero">Primero</label>
                                <input type="radio" name="curso" value="2" id="segundo"><label for="segundo">Segundo</label>
                                <input type="radio" name="curso" value="3" id="tercero"><label for="tercero">Tercero</label>
                            @elseif($alumno['curso'] == 2)
                                <input type="radio" name="curso" value="1" id="primero"><label for="primero">Primero</label>
                                <input type="radio" name="curso" value="2" id="segundo" checked><label for="segundo">Segundo</label>
                                <input type="radio" name="curso" value="3" id="tercero"><label for="tercero">Tercero</label>
                            @else
                                <input type="radio" name="curso" value="1" id="primero"><label for="primero">Primero</label>
                                <input type="radio" name="curso" value="2" id="segundo"><label for="segundo">Segundo</label>
                                <input type="radio" name="curso" value="3" id="tercero" checked><label for="tercero">Tercero</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Turno</label><br/>
                            @if($alumno['turno'] == "M")
                                <input type="radio" name="turno" value="M" id="mañana" checked><label for="mañana">Mañana</label>
                                <input type="radio" name="turno" value="T" id="tarde"><label for="tarde">Tarde</label>
                            @else
                                <input type="radio" name="turno" value="M" id="mañana"><label for="mañana">Mañana</label>
                                <input type="radio" name="turno" value="T" id="tarde" checked><label for="tarde">Tarde</label>
                            @endif
                        </div>
                        <button class="btn btn-success" type="submit">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
