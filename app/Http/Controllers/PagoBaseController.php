<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegistroPagoBase;
use App\Models\Personal;
use App\Models\Conductor;
use Carbon\Carbon;

class PagoBaseController extends Controller
{
    public function index()
    {
        $pagobase = RegistroPagoBase::get();
        return view('pagobase.index',compact('pagobase'));
    }

    public function create()
    {
        $personal = Personal::get();
        $conductor = Conductor::get();
        return view('pagobase.create',compact('personal','conductor'));
    }


    public function store(Request $request)
    {
        $data=request()->validate([
            'monto' => 'required',
            'descripcion' => 'required|min:8|regex:/^[a-zA-Z\s]+$/u',
            'personal' => 'required|not_in:0',
            'conductor' => 'required|not_in:0'
        ],
        [
            'monto.required' => 'Ingrese monto de pago',
            'descripcion.required' => 'Ingrese descripcion',
            'descripcion.regex' => 'Ingrese solo caracteres',
            'descripcion.min'=> 'Descripcion muy corta',
            'personal.required' => 'Ingrese personal',
            'personal.not_in'=> 'Seleccione un personal',
            'conductor.required' => 'Ingrese personal',
            'conductor.not_in'=> 'Seleccione un personal'
        ]);

        $pagobase = new RegistroPagoBase;

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $pagobase->monto = $request->monto;
        $pagobase->fecha_pago = $date;
        $pagobase->descripcion = $request->descripcion;
        $pagobase->personal_id = $request->personal;
        $pagobase->conductor_id = $request->conductor;

        $pagobase->save();

        return redirect()->route('pagobase.index')->with('datos','Registro Guardado...');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $personal = Personal::get();
        $conductor = Conductor::get();
        $pagobase = RegistroPagoBase::where('id','=',$id)->first();
        return view('pagobase.edit',compact('personal','conductor','pagobase'));
    }


    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'monto' => 'required',
            'descripcion' => 'required|min:8|regex:/^[a-zA-Z\s]+$/u',
            'personal' => 'required|not_in:0',
            'conductor' => 'required|not_in:0'
        ],
        [
            'monto.required' => 'Ingrese monto de pago',
            'descripcion.required' => 'Ingrese descripcion',
            'descripcion.regex' => 'Ingrese solo caracteres',
            'descripcion.min'=> 'Descripcion muy corta',
            'personal.required' => 'Ingrese personal',
            'personal.not_in'=> 'Seleccione un personal',
            'conductor.required' => 'Ingrese personal',
            'conductor.not_in'=> 'Seleccione un personal'
        ]);

        $pagobase = RegistroPagoBase::where('id','=',$id)->first();

        $pagobase->monto = $request->monto;
        $pagobase->descripcion = $request->descripcion;
        $pagobase->personal_id = $request->personal;
        $pagobase->conductor_id = $request->conductor;

        $pagobase->save();

        return redirect()->route('pagobase.index')->with('datos','Registro Actualizado...');
    }

    public function confirmar($id)
    {      
        $pagobase=RegistroPagoBase::where('id','=',$id)->first();
        return view('pagobase.confirmar',compact('pagobase'));
    }

    public function destroy($id)
    {
        $pagobase=RegistroPagoBase::findOrFail($id);
        $pagobase->delete();
        return redirect()->route('pagobase.index')->with('datos','Registro Eliminado!');
    }
}
