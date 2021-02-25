<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropietarioRequest;
use App\Http\Requests\UpdatePropietarioRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Flash;
use Response;

class PropietarioController extends AppBaseController
{
    /**
     * Display a listing of the Propietario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Propietario $propietarios */
        $propietarios = Propietario::all();

        return view('propietarios.index')
            ->with('propietarios', $propietarios);
    }

    /**
     * Show the form for creating a new Propietario.
     *
     * @return Response
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created Propietario in storage.
     *
     * @param CreatePropietarioRequest $request
     *
     * @return Response
     */
    public function store(CreatePropietarioRequest $request)
    {
        $input = $request->all();

        /** @var Propietario $propietario */
        $propietario = Propietario::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/propietarios.singular')]));

        return redirect(route('propietarios.index'));
    }

    /**
     * Display the specified Propietario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Propietario $propietario */
        $propietario = Propietario::find($id);

        if (empty($propietario)) {
            Flash::error(__('models/propietarios.singular').' '.__('messages.not_found'));

            return redirect(route('propietarios.index'));
        }

        return view('propietarios.show')->with('propietario', $propietario);
    }

    /**
     * Show the form for editing the specified Propietario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Propietario $propietario */
        $propietario = Propietario::find($id);

        if (empty($propietario)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propietarios.singular')]));

            return redirect(route('propietarios.index'));
        }

        return view('propietarios.edit')->with('propietario', $propietario);
    }

    /**
     * Update the specified Propietario in storage.
     *
     * @param int $id
     * @param UpdatePropietarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropietarioRequest $request)
    {
        /** @var Propietario $propietario */
        $propietario = Propietario::find($id);

        if (empty($propietario)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propietarios.singular')]));

            return redirect(route('propietarios.index'));
        }

        $propietario->fill($request->all());
        $propietario->save();

        Flash::success(__('messages.updated', ['model' => __('models/propietarios.singular')]));

        return redirect(route('propietarios.index'));
    }

    /**
     * Remove the specified Propietario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Propietario $propietario */
        $propietario = Propietario::find($id);

        if (empty($propietario)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propietarios.singular')]));

            return redirect(route('propietarios.index'));
        }

        $propietario->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/propietarios.singular')]));

        return redirect(route('propietarios.index'));
    }
}
