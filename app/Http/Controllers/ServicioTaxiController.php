<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegistroServicioTaxi;
use App\Models\Cliente;

class ServicioTaxiController extends Controller
{
    public function index()
    {
        $taxi = RegistroServicioTaxi::get();
        return view('serviciotaxi.index',compact('taxi'));
    }

    public function create()
    {
        $cliente = Cliente::get();
        return view('serviciotaxi.create',compact('cliente'));
    }


    public function store(Request $request)
    {
        $data=request()->validate([
            'cliente' => 'required|not_in:0'
        ],
        [
            'cliente.required' => 'Ingrese cliente',
            'cliente.not_in'=> 'Seleccione un cliente'
        ]);

        $taxi = new RegistroServicioTaxi;

        $taxi->cliente_id = $request->cliente;

        $taxi->save();

        return redirect()->route('serviciotaxi.index')->with('datos','Registro Guardado...');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cliente = Cliente::get();
        $taxi = RegistroServicioTaxi::where('id','=',$id)->first();
        return view('serviciotaxi.edit',compact('cliente','taxi'));
    }


    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'cliente' => 'required|not_in:0'
        ],
        [
            'cliente.required' => 'Ingrese cliente',
            'cliente.not_in'=> 'Seleccione un cliente'
        ]);

        $taxi = RegistroServicioTaxi::where('id','=',$id)->first();

        $taxi->cliente_id = $request->cliente;

        $taxi->save();

        return redirect()->route('serviciotaxi.index')->with('datos','Registro Actualizado...');
    }

    public function confirmar($id)
    {      
        $taxi=RegistroServicioTaxi::where('id','=',$id)->first();
        return view('serviciotaxi.confirmar',compact('taxi'));
    }

    public function destroy($id)
    {
        $taxi=RegistroServicioTaxi::findOrFail($id);
        $taxi->delete();
        return redirect()->route('serviciotaxi.index')->with('datos','Registro Eliminado!');
    }
}
