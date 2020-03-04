<html>
<head>
<!--<style>
    *{
    font-family:Montserrat; 
    margin: 0;
    padding: 0;
}
.contenido{
    margin-top: 1em;
    width: 80%;
    margin-left: 10%;
}
.datosEmpresa{
    float: right;
    width: 50%;
    text-align: right;
}
.datosEmpresa p{
    font-size: large;
}
.icon-especialidad{
    width:10%;
    align-items: left;  
}
table{
    border:0.5px solid black;
    margin-top: 1em;
    text-align: left;
    font-family:Montserrat; 
    width: 100%;
    border-collapse: collapse;
    border-bottom:1px solid #181E24;
}
table thead tr td{
    padding:15px 10px;
    background-color:#181E24; 
    color: white;
}
th, td{
    padding:8px;
}
tr:nth-child(even){
    background-color: rgb(207, 206, 206);
}
.reservas{
    font-size: 48px;
    text-align: center;
    width: 100%;
    height: 1em;
}

.divisorPie{
    margin-top: 1em;
    color:rgb(250, 41, 76);
    width: 100%;
}
.infoAdicional{
    width:30%;
    float:right;
    margin-top: 1em;
    text-align: right;
}
.piePagina{
    margin-top:1em;
    width: 100%;
    border-top:2px solid #181E24;
    float: right;
}
.telefono{
    margin-top:4px;
    width: 10%;
    float:left;
    height:2em;
    text-align: center;
    border-right: 1px solid black;
    padding-right: 8px;
    font-size: small;
}
.pagina{
    margin-top:4px;
    margin-left: 2px;
    width: 10%;
    text-align: center;
    font-size: small;
    float:left;
    padding-left: 8px;
    height:2em;
}
.direccion{
    margin-top:4px;
    font-size: small;
    margin-left: 2px;
    width: 30%;
    text-align: center;
    float:left;
    border-right: 1px solid black;
    height:2em;
}
</style>-->
</head>
<body>
    <div class="contenido">
        <img class="icon-especialidad" src="{{asset('./security.png')}}" >
        <div class="datosEmpresa">
            <p>Asucion, {{date("d",time())}} de {{date("M",time())}} de {{date("Y",time())}}</p>
            <b><p>Especialidad de Informática</p></b>
            <br/>
        </div>
        <table>
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Motivo Utilizacion</td>
                    <td>Hojas a imprimir</td>
                    <td>Id Alumno</td>
                    <td>Fecha y hora</td>
                </tr>
            </thead>
            <tbody>
                @if(!empty($salas))
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
        <div class="infoAdicional">
            <p>INFORMACION ADICIONAL</p>
            <table>
                <tr>
                    <td>HOJAS IMPRESAS:</td>
                    <td>500</td>
                </tr>
            </table>
        </div>
        <div class="piePagina">
            <div class="telefono">
                (021) 608 663
            </div>
            <div class="direccion">
                R.I. 3 Corrales c/ Dr. Hassler
    Campos Cervera, Asunción
            </div>
            <div class="pagina">http://www.ctnasuncion.edu.py</div>
        </div>
    </div>

</body>
</html>