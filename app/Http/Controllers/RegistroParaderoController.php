<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegistroParaderoRequest;
use App\Http\Requests\UpdateRegistroParaderoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\RegistroParadero;
use Illuminate\Http\Request;
use Flash;
use Response;

class RegistroParaderoController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the RegistroParadero.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var RegistroParadero $registroParaderos */
        $registroParaderos = RegistroParadero::paginate(10);

        return view('registro_paraderos.index')
            ->with('registroParaderos', $registroParaderos);
    }

    /**
     * Show the form for creating a new RegistroParadero.
     *
     * @return Response
     */
    public function create()
    {
        return view('registro_paraderos.create');
    }

    /**
     * Store a newly created RegistroParadero in storage.
     *
     * @param CreateRegistroParaderoRequest $request
     *
     * @return Response
     */
    public function store(CreateRegistroParaderoRequest $request)
    {
        $input = $request->all();

        /** @var RegistroParadero $registroParadero */
        $registroParadero = RegistroParadero::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/registroParaderos.singular')]));

        return redirect(route('registroParaderos.index'));
    }

    /**
     * Display the specified RegistroParadero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RegistroParadero $registroParadero */
        $registroParadero = RegistroParadero::find($id);

        if (empty($registroParadero)) {
            Flash::error(__('models/registroParaderos.singular').' '.__('messages.not_found'));

            return redirect(route('registroParaderos.index'));
        }

        return view('registro_paraderos.show')->with('registroParadero', $registroParadero);
    }

    /**
     * Show the form for editing the specified RegistroParadero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var RegistroParadero $registroParadero */
        $registroParadero = RegistroParadero::find($id);

        if (empty($registroParadero)) {
            Flash::error(__('messages.not_found', ['model' => __('models/registroParaderos.singular')]));

            return redirect(route('registroParaderos.index'));
        }

        return view('registro_paraderos.edit')->with('registroParadero', $registroParadero);
    }

    /**
     * Update the specified RegistroParadero in storage.
     *
     * @param int $id
     * @param UpdateRegistroParaderoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegistroParaderoRequest $request)
    {
        /** @var RegistroParadero $registroParadero */
        $registroParadero = RegistroParadero::find($id);

        if (empty($registroParadero)) {
            Flash::error(__('messages.not_found', ['model' => __('models/registroParaderos.singular')]));

            return redirect(route('registroParaderos.index'));
        }

        $registroParadero->fill($request->all());
        $registroParadero->save();

        Flash::success(__('messages.updated', ['model' => __('models/registroParaderos.singular')]));

        return redirect(route('registroParaderos.index'));
    }

    /**
     * Remove the specified RegistroParadero from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RegistroParadero $registroParadero */
        $registroParadero = RegistroParadero::find($id);

        if (empty($registroParadero)) {
            Flash::error(__('messages.not_found', ['model' => __('models/registroParaderos.singular')]));

            return redirect(route('registroParaderos.index'));
        }

        $registroParadero->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/registroParaderos.singular')]));

        return redirect(route('registroParaderos.index'));
    }
}
