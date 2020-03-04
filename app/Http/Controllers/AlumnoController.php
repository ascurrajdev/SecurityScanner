<?php

namespace App\Http\Controllers;
use App\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('nombre')){
            $alumnos = Alumno::where('nombre', 'like', '%' .$request->input('nombre'). '%')
            ->paginate(2);
            return view('alumnos',compact('alumnos'));
        }else{
            $alumnos = Alumno::paginate(2);
            return view('alumnos',compact('alumnos'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnosCrear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = new Alumno;
        $alumno->id = $request->input('id');
        $alumno->cedula = $request->input('cedula');
        $alumno->nombre = $request->input('nombre');
        $alumno->apellido = $request->input('apellido');
        $alumno->curso = $request->input('curso');
        $alumno->turno = $request->input('turno');
        $alumno->save();
        return redirect('alumno');
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
        $alumnoData = Alumno::find($id);
        $alumno = array("id"=>$alumnoData->id, "cedula"=>$alumnoData->cedula, "nombre"=>$alumnoData->nombre, "apellido"=>$alumnoData->apellido, "curso"=>$alumnoData->curso, "turno"=>$alumnoData->turno);
        return view('alumnosModificar', compact('alumno'));
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
        $alumno = Alumno::find($id);
        $alumno->id = $request->input('id');
        $alumno->cedula = $request->input('cedula');
        $alumno->nombre = $request->input('nombre');
        $alumno->apellido = $request->input('apellido');
        $alumno->curso = $request->input('curso');
        $alumno->turno = $request->input('turno');
        $alumno->save();
        return redirect('alumno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumno::destroy($id);
        return redirect('alumno');
    }
}
