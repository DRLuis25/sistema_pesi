<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConductorRequest;
use App\Http\Requests\UpdateConductorRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Conductor;
use App\Models\FichaConductor;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConductorController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the Conductor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Conductor $conductors */
        $conductors = Conductor::paginate(10);

        return view('conductors.index')
            ->with('conductors', $conductors);
    }

    /**
     * Show the form for creating a new Conductor.
     *
     * @return Response
     */
    public function create()
    {
        $fichaConductores = FichaConductor::all();
        return view('conductors.create',compact('fichaConductores'));
    }

    /**
     * Store a newly created Conductor in storage.
     *
     * @param CreateConductorRequest $request
     *
     * @return Response
     */
    public function store(CreateConductorRequest $request)
    {
        $input = $request->all();

        /** @var Conductor $conductor */
        $conductor = Conductor::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/conductors.singular')]));

        return redirect(route('conductors.index'));
    }

    /**
     * Display the specified Conductor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Conductor $conductor */
        $conductor = Conductor::find($id);

        if (empty($conductor)) {
            Flash::error(__('models/conductors.singular').' '.__('messages.not_found'));

            return redirect(route('conductors.index'));
        }

        return view('conductors.show')->with('conductor', $conductor);
    }

    /**
     * Show the form for editing the specified Conductor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Conductor $conductor */
        $conductor = Conductor::find($id);
        $fichaConductores = FichaConductor::all();
        if (empty($conductor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/conductors.singular')]));

            return redirect(route('conductors.index'));
        }

        return view('conductors.edit',compact('fichaConductores'))->with('conductor', $conductor);
    }

    /**
     * Update the specified Conductor in storage.
     *
     * @param int $id
     * @param UpdateConductorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConductorRequest $request)
    {
        /** @var Conductor $conductor */
        $conductor = Conductor::find($id);

        if (empty($conductor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/conductors.singular')]));

            return redirect(route('conductors.index'));
        }

        $conductor->fill($request->all());
        $conductor->save();

        Flash::success(__('messages.updated', ['model' => __('models/conductors.singular')]));

        return redirect(route('conductors.index'));
    }

    /**
     * Remove the specified Conductor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Conductor $conductor */
        $conductor = Conductor::find($id);

        if (empty($conductor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/conductors.singular')]));

            return redirect(route('conductors.index'));
        }

        $conductor->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/conductors.singular')]));

        return redirect(route('conductors.index'));
    }
}
