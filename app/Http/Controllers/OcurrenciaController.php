<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroOcurrencia;
use App\Models\Personal;
use carbon\Carbon;

class OcurrenciaController extends Controller
{
    
    public function index()
    {
        $ocurrencia = RegistroOcurrencia::get();
        return view('ocurrencia.index',compact('ocurrencia'));
    }

    public function create()
    {
        $personal = Personal::get();
        return view('ocurrencia.create',compact('personal'));
    }


    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion' => 'required|min:8|regex:/^[a-zA-Z\s]+$/u',
            'personal' => 'required|not_in:0'
        ],
        [
            'descripcion.required' => 'Ingrese descripcion',
            'descripcion.regex' => 'Ingrese solo caracteres',
            'descripcion.min'=> 'Descripcion muy corta',
            'personal.required' => 'Ingrese personal',
            'personal.not_in'=> 'Seleccione un personal'
        ]);

        $ocurrencia = new RegistroOcurrencia;

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $ocurrencia->descripcion = $request->descripcion;
        $ocurrencia->fecha = $date;
        $ocurrencia->personal_id = $request->personal;

        $ocurrencia->save();

        return redirect()->route('ocurrencia.index')->with('datos','Registro Guardado...');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $personal = Personal::get();
        $ocurrencia = RegistroOcurrencia::where('id','=',$id)->first();
        return view('ocurrencia.edit',compact('personal','ocurrencia'));
    }


    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'descripcion' => 'required|min:8|regex:/^[a-zA-Z\s]+$/u',
            'personal' => 'required|not_in:0'
        ],
        [
            'descripcion.required' => 'Ingrese descripcion',
            'descripcion.regex' => 'Ingrese solo caracteres',
            'descripcion.min'=> 'Descripcion muy corta',
            'personal.required' => 'Ingrese personal',
            'personal.not_in'=> 'Seleccione un personal'
        ]);

        $ocurrencia = RegistroOcurrencia::where('id','=',$id)->first();

        $ocurrencia->descripcion = $request->descripcion;
        $ocurrencia->personal_id = $request->personal;

        $ocurrencia->save();

        return redirect()->route('ocurrencia.index')->with('datos','Registro Actualizado...');
    }

    public function confirmar($id)
    {      
        $ocurrencia=RegistroOcurrencia::where('id','=',$id)->first();
        return view('ocurrencia.confirmar',compact('ocurrencia'));
    }

    public function destroy($id)
    {
        $ocurrencia=RegistroOcurrencia::findOrFail($id);
        $ocurrencia->delete();
        return redirect()->route('ocurrencia.index')->with('datos','Registro Eliminado!');
    }
}
