<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Flash;
use Response;

class VehiculoController extends AppBaseController
{
    /**
     * Display a listing of the Vehiculo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Vehiculo $vehiculos */
        $vehiculos = Vehiculo::all();

        return view('vehiculos.index')
            ->with('vehiculos', $vehiculos);
    }

    /**
     * Show the form for creating a new Vehiculo.
     *
     * @return Response
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created Vehiculo in storage.
     *
     * @param CreateVehiculoRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiculoRequest $request)
    {
        $input = $request->all();

        /** @var Vehiculo $vehiculo */
        $vehiculo = Vehiculo::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vehiculos.singular')]));

        return redirect(route('vehiculos.index'));
    }

    /**
     * Display the specified Vehiculo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Vehiculo $vehiculo */
        $vehiculo = Vehiculo::find($id);

        if (empty($vehiculo)) {
            Flash::error(__('models/vehiculos.singular').' '.__('messages.not_found'));

            return redirect(route('vehiculos.index'));
        }

        return view('vehiculos.show')->with('vehiculo', $vehiculo);
    }

    /**
     * Show the form for editing the specified Vehiculo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Vehiculo $vehiculo */
        $vehiculo = Vehiculo::find($id);

        if (empty($vehiculo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehiculos.singular')]));

            return redirect(route('vehiculos.index'));
        }

        return view('vehiculos.edit')->with('vehiculo', $vehiculo);
    }

    /**
     * Update the specified Vehiculo in storage.
     *
     * @param int $id
     * @param UpdateVehiculoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiculoRequest $request)
    {
        /** @var Vehiculo $vehiculo */
        $vehiculo = Vehiculo::find($id);

        if (empty($vehiculo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehiculos.singular')]));

            return redirect(route('vehiculos.index'));
        }

        $vehiculo->fill($request->all());
        $vehiculo->save();

        Flash::success(__('messages.updated', ['model' => __('models/vehiculos.singular')]));

        return redirect(route('vehiculos.index'));
    }

    /**
     * Remove the specified Vehiculo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Vehiculo $vehiculo */
        $vehiculo = Vehiculo::find($id);

        if (empty($vehiculo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vehiculos.singular')]));

            return redirect(route('vehiculos.index'));
        }

        $vehiculo->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/vehiculos.singular')]));

        return redirect(route('vehiculos.index'));
    }
}
