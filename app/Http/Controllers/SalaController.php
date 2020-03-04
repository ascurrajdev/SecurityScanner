<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Sala;
use \PDF;
use App\Jobs\ProcessPDF;
use App\Events\GenerarPDF;
use Illuminate\Support\Facades\Storage;
class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = "";
        if($request->has('inicioFecha') && $request->has('finFecha') && $request->finFecha != "" && $request->inicioFecha != ""){
            $inicio = $request->input('inicioFecha');
            $fin = $request->input('finFecha');
            session('inicioFecha',$inicio);
            session('finFecha',$fin);
            $filtro = "si";
            //$coleccion = collect([$inicio." 00:00", $fin." 00:00"]);
            //ProcessPDF::dispatch($coleccion);
            //$coleccion = $this->collection;
            $salas = Sala::whereBetween('created_at',[$inicio,$fin])->get();
            $pdf = PDF::loadView('pdf.reservas', compact('salas'));
            Storage::disk('public')->put('reservasSalaVirtual.pdf', $pdf->output());
            $salas =Sala::whereBetween('created_at',[$inicio,$fin])->paginate(2);
            return view('reservas',compact(['salas','filtro']));
        }else{
            $salas = Sala::paginate(2); 
            return view('reservas',compact(['salas','filtro']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('motivo_utilizacion') && $request->has('hojas_a_imprimir') && $request->has('alumno_id')){
        $motivoUtilizacion = "";
        if($request->input('motivo_utilizacion') == "1"){
            $motivoUtilizacion = "Investigacion";
        }else if($request->input('motivo_utilizacion') == "2"){
            $motivoUtilizacion = "Impresion";
        }
        else{
            $motivoUtilizacion = "Investigacion e impresion";
        }
        $reserva = new Sala;
        $reserva->motivo_utilizacion = $motivoUtilizacion;
        $reserva->hojas_a_imprimir = $request->input('hojas_a_imprimir');
        $reserva->alumno_id = $request->input('alumno_id');
        $reserva->save();
        return "Operacion exitosa";
        }else{
            return "Introduzca todos los datos por favor";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
