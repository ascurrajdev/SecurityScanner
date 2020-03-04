@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Filtrar Fechas</div>
                <div class="card-body">
                <form class="form-inline" method="GET" action="{{url('reservas')}}">
                        <div class="form-group">
                        <label>Desde&nbsp&nbsp</label><input type="date" name="inicioFecha" value="{{session('inicioFecha')}}">
                        </div>
                        <div class="form-group">
                        <label>&nbsp&nbsphasta&nbsp&nbsp</label><input type="date" name="finFecha" value="{{session('finFecha')}}">
                        </div>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <button type="submit" class="btn btn-primary">Buscar</button>&nbsp
                        @if($filtro != "si")
                            <a class="btn btn-danger disabled" href="{{asset('storage/reservasSalaVirtual.pdf')}}">Exportar a pdf</a>
                        @else
                        <a class="btn btn-danger " href="{{asset('storage/reservasSalaVirtual.pdf')}}">Exportar a pdf</a>
                        </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Reservas</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Motivo Utilizacion</th>
                                <th>Hojas a imprimir</th>
                                <th>Id Alumno</th>
                                <th>Fecha y hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($salas) && sizeof($salas)>0)
                                @foreach($salas as $sala)
                                    <tr>
                                        <td>{{$sala->id}}</td>
                                        <td>{{$sala->motivo_utilizacion}}</td>
                                        <td>{{$sala->hojas_a_imprimir}}</td>
                                        <td>{{$sala->alumno_id}}</td>
                                        <td>{{$sala->created_at}}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td>No hay resultados</td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$salas->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
