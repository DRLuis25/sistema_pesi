<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamo;
use App\Models\Personal;
use App\Models\cliente;

class ReclamoController extends Controller
{
    public function index()
    {
        $reclamo = Reclamo::get();
        return view('reclamo.index',compact('reclamo'));
    }

    public function create()
    {
        $personal = Personal::get();
        $cliente = Cliente::get();
        return view('reclamo.create',compact('personal','cliente'));
    }


    public function store(Request $request)
    {
        $reclamo = new Reclamo;

        $reclamo->descripcion = $request->descripcion;
        $reclamo->cliente_id = $request->cliente;
        $reclamo->personal_id = $request->personal;

        $reclamo->save();

        return redirect()->route('reclamo.index')->with('datos','Registro Guardado...');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $personal = Personal::get();
        $cliente = Cliente::get();
        $reclamo = Reclamo::where('id','=',$id)->first();
        return view('reclamo.edit',compact('personal','cliente','reclamo'));
    }


    public function update(Request $request, $id)
    {
        $reclamo = Reclamo::where('id','=',$id)->first();

        $reclamo->descripcion = $request->descripcion;
        $reclamo->cliente_id = $request->cliente;
        $reclamo->personal_id = $request->personal;

        $reclamo->save();

        return redirect()->route('reclamo.index')->with('datos','Registro Actualizado...');
    }

    public function confirmar($id)
    {      
        $reclamo=Reclamo::where('id','=',$id)->first();
        return view('reclamo.confirmar',compact('reclamo'));
    }

    public function destroy($id)
    {
        $reclamo=Reclamo::findOrFail($id);
        $reclamo->delete();
        return redirect()->route('reclamo.index')->with('datos','Registro Eliminado!');
    }

}
