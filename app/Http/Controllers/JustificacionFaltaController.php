<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JustificacionFalta;
use App\Models\RegistroSancion;
use Carbon\carbon;

class JustificacionFaltaController extends Controller
{
    public function index()
    {
        $falta = JustificacionFalta::get();
        return view('justificacionfalta.index',compact('falta'));
    }

    public function create()
    {
        $registrosanciones = RegistroSancion::get();
        return view('justificacionfalta.create',compact('registrosanciones'));
    }


    public function store(Request $request)
    {
        $falta = new JustificacionFalta;

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $falta->descripcion = $request->descripcion;
        $falta->fecha_justificacion = $date;
        $falta->registro_sancion_id = $request->sancion;

        $falta->save();

        return redirect()->route('justificacionfalta.index')->with('datos','Registro Guardado...');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $falta = JustificacionFalta::where('id','=',$id)->first();
        $registrosanciones = RegistroSancion::get();
        return view('justificacionfalta.edit',compact('registrosanciones','falta'));
    }


    public function update(Request $request, $id)
    {
        $falta = JustificacionFalta::where('id','=',$id)->first();

        $falta->descripcion = $request->descripcion;
        $falta->registro_sancion_id = $request->sancion;

        $falta->save();

        return redirect()->route('justificacionfalta.index')->with('datos','Registro Actualizado...');
    }

    public function confirmar($id)
    {      
        $falta=JustificacionFalta::where('id','=',$id)->first();
        return view('justificacionfalta.confirmar',compact('falta'));
    }

    public function destroy($id)
    {
        $falta=JustificacionFalta::findOrFail($id);
        $falta->delete();
        return redirect()->route('justificacionfalta.index')->with('datos','Registro Eliminado!');
    }
}
