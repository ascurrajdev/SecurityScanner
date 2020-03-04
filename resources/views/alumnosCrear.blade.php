@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Nuevo Alumno</div>
                <div class="card-body">
                    <form method="POST" action="{{url('alumno')}}">
                        @csrf
                        <div class="form-group">
                            <label for="id">#ID</label>
                        <input class="form-control" type="number" name="id" id="id">
                        </div>
                        <div class="form-group">
                            <label for="id">Cedula</label>
                            <input class="form-control" type="number" name="cedula" id="cedula">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido">
                        </div>
                        <div class="form-group">
                            <label for="curso">Curso</label><br/>
                                <input type="radio" name="curso" value="1" id="primero"><label for="primero">Primero</label>
                                <input type="radio" name="curso" value="2" id="segundo"><label for="segundo">Segundo</label>
                                <input type="radio" name="curso" value="3" id="tercero"><label for="tercero">Tercero</label>
                           
                        </div>
                        <div class="form-group">
                            <label>Turno</label><br/>
                                <input type="radio" name="turno" value="M" id="mañana"><label for="mañana">Mañana</label>
                                <input type="radio" name="turno" value="T" id="tarde"><label for="tarde">Tarde</label>
                        </div>
                        <button class="btn btn-success" type="submit">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
