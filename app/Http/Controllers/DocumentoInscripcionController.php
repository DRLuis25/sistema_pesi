<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DocumentoInscripcion;
use App\Models\Conductor;
use App\Models\Propietario;
use App\Models\Vehiculo;

class DocumentoInscripcionController extends Controller
{
    
    public function index()
    {
        $documento = DocumentoInscripcion::get();
        return view('documentoinscripcion.index',compact('documento'));
    }

    public function create()
    {
        $conductor = Conductor::get();
        $propietario = Propietario::get();
        $vehiculo = Vehiculo::get();
        return view('documentoinscripcion.create',compact('conductor','propietario','vehiculo'));
    }


    public function store(Request $request)
    {
        $data=request()->validate([
            'conductor' => 'required|not_in:0',
            'propietario' => 'required|not_in:0',
            'vehiculo' => 'required|not_in:0'
        ],
        [
            'conductor.required' => 'Ingrese conductor',
            'conductor.not_in'=> 'Seleccione un conductor',
            'propietario.required' => 'Ingrese propietario',
            'propietario.not_in'=> 'Seleccione un propietario',
            'vehiculo.required' => 'Ingrese vehiculo',
            'vehiculo.not_in'=> 'Seleccione un vehiculo'
        ]);

        $documento = new DocumentoInscripcion;

        $documento->conductor_id = $request->conductor;
        $documento->propietario_id = $request->propietario;
        $documento->vehiculo_id = $request->vehiculo;

        $documento->save();

        return redirect()->route('documentoinscripcion.index')->with('datos','Registro Guardado...');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $conductor = Conductor::get();
        $propietario = Propietario::get();
        $vehiculo = Vehiculo::get();
        $documento = DocumentoInscripcion::where('id','=',$id)->first();
        return view('documentoinscripcion.edit',compact('conductor','propietario','vehiculo','documento'));
    }


    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'conductor' => 'required|not_in:0',
            'propietario' => 'required|not_in:0',
            'vehiculo' => 'required|not_in:0'
        ],
        [
            'conductor.required' => 'Ingrese conductor',
            'conductor.not_in'=> 'Seleccione un conductor',
            'propietario.required' => 'Ingrese propietario',
            'propietario.not_in'=> 'Seleccione un propietario',
            'vehiculo.required' => 'Ingrese vehiculo',
            'vehiculo.not_in'=> 'Seleccione un vehiculo'
        ]);
        
        $documento = DocumentoInscripcion::where('id','=',$id)->first();

        $documento->conductor_id = $request->conductor;
        $documento->propietario_id = $request->propietario;
        $documento->vehiculo_id = $request->vehiculo;

        $documento->save();

        return redirect()->route('documentoinscripcion.index')->with('datos','Registro Actualizado...');
    }

    public function confirmar($id)
    {      
        $documento=DocumentoInscripcion::where('id','=',$id)->first();
        return view('documentoinscripcion.confirmar',compact('documento'));
    }

    public function destroy($id)
    {
        $documento=DocumentoInscripcion::findOrFail($id);
        $documento->delete();
        return redirect()->route('documentoinscripcion.index')->with('datos','Registro Eliminado!');
    }
}
