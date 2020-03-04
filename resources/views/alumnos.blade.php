@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Buscar Alumnos
                </div>
                <div class="card-body">
                    <form method="GET" class="form-inline" action="{{url('alumno')}}">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                            <input class="form-control" type="text" name="nombre" placeholder="Introduzca el nombre del alumno">
                        </div>
                        <button class="btn btn-success mb-2" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Alumnos</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Curso</th>
                                <th>Turno</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($alumnos) && sizeof($alumnos)>0)
                                @foreach($alumnos as $alumno)
                                    <tr>
                                        <td>{{$alumno->id}}</td>
                                        <td>{{$alumno->cedula}}</td>
                                        <td>{{$alumno->nombre}}</td>
                                        <td>{{$alumno->apellido}}</td>
                                        <td>{{$alumno->curso}}</td>
                                        <td>{{$alumno->turno}}</td>
                                        <td>
                                            <a href="{{url('alumno/'.$alumno->id.'/edit')}}" class="btn btn-primary">Modificar</a>
                                            
                                        </td>
                                        <td><form method="POST" action="{{url('alumno', $alumno->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-small btn-danger">Eliminar</button>
                                        </form></td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td>No hay resultados</td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$alumnos->links()}}
                </div>
            </div>
        </div>
    </div>
    <a href="{{url('alumno/create')}}" class="btn btn-success">Crear Alumno</a>
</div>
@endsection
