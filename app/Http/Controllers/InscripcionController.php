<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscripcionRequest;
use App\Http\Requests\UpdateInscripcionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Flash;
use Response;

class InscripcionController extends AppBaseController
{
    /**
     * Display a listing of the Inscripcion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Inscripcion $inscripcions */
        $inscripcions = Inscripcion::all();

        return view('inscripcions.index')
            ->with('inscripcions', $inscripcions);
    }

    /**
     * Show the form for creating a new Inscripcion.
     *
     * @return Response
     */
    public function create()
    {
        return view('inscripcions.create');
    }

    /**
     * Store a newly created Inscripcion in storage.
     *
     * @param CreateInscripcionRequest $request
     *
     * @return Response
     */
    public function store(CreateInscripcionRequest $request)
    {
        $input = $request->all();

        /** @var Inscripcion $inscripcion */
        $inscripcion = Inscripcion::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/inscripcions.singular')]));

        return redirect(route('inscripcions.index'));
    }

    /**
     * Display the specified Inscripcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Inscripcion $inscripcion */
        $inscripcion = Inscripcion::find($id);

        if (empty($inscripcion)) {
            Flash::error(__('models/inscripcions.singular').' '.__('messages.not_found'));

            return redirect(route('inscripcions.index'));
        }

        return view('inscripcions.show')->with('inscripcion', $inscripcion);
    }

    /**
     * Show the form for editing the specified Inscripcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Inscripcion $inscripcion */
        $inscripcion = Inscripcion::find($id);

        if (empty($inscripcion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/inscripcions.singular')]));

            return redirect(route('inscripcions.index'));
        }

        return view('inscripcions.edit')->with('inscripcion', $inscripcion);
    }

    /**
     * Update the specified Inscripcion in storage.
     *
     * @param int $id
     * @param UpdateInscripcionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscripcionRequest $request)
    {
        /** @var Inscripcion $inscripcion */
        $inscripcion = Inscripcion::find($id);

        if (empty($inscripcion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/inscripcions.singular')]));

            return redirect(route('inscripcions.index'));
        }

        $inscripcion->fill($request->all());
        $inscripcion->save();

        Flash::success(__('messages.updated', ['model' => __('models/inscripcions.singular')]));

        return redirect(route('inscripcions.index'));
    }

    /**
     * Remove the specified Inscripcion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Inscripcion $inscripcion */
        $inscripcion = Inscripcion::find($id);

        if (empty($inscripcion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/inscripcions.singular')]));

            return redirect(route('inscripcions.index'));
        }

        $inscripcion->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/inscripcions.singular')]));

        return redirect(route('inscripcions.index'));
    }
}
