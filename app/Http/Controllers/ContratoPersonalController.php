<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContratoPersonalRequest;
use App\Http\Requests\UpdateContratoPersonalRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\ContratoPersonal;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContratoPersonalController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the ContratoPersonal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ContratoPersonal $contratoPersonals */
        $contratoPersonals = ContratoPersonal::all();//where('estado','=','1')->get();

        return view('contrato_personals.index')
            ->with('contratoPersonals', $contratoPersonals);
    }

    /**
     * Show the form for creating a new ContratoPersonal.
     *
     * @return Response
     */
    public function create()
    {
        return view('contrato_personals.create');
    }

    /**
     * Store a newly created ContratoPersonal in storage.
     *
     * @param CreateContratoPersonalRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoPersonalRequest $request)
    {
        $input = $request->all();

        /** @var ContratoPersonal $contratoPersonal */
        $contratoPersonal = ContratoPersonal::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contratoPersonals.singular')]));

        return redirect(route('contratoPersonals.index'));
    }

    /**
     * Display the specified ContratoPersonal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContratoPersonal $contratoPersonal */
        $contratoPersonal = ContratoPersonal::find($id);

        if (empty($contratoPersonal)) {
            Flash::error(__('models/contratoPersonals.singular').' '.__('messages.not_found'));

            return redirect(route('contratoPersonals.index'));
        }

        return view('contrato_personals.show')->with('contratoPersonal', $contratoPersonal);
    }

    /**
     * Show the form for editing the specified ContratoPersonal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ContratoPersonal $contratoPersonal */
        $contratoPersonal = ContratoPersonal::find($id);

        if (empty($contratoPersonal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contratoPersonals.singular')]));

            return redirect(route('contratoPersonals.index'));
        }

        return view('contrato_personals.edit')->with('contratoPersonal', $contratoPersonal);
    }

    /**
     * Update the specified ContratoPersonal in storage.
     *
     * @param int $id
     * @param UpdateContratoPersonalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoPersonalRequest $request)
    {
        /** @var ContratoPersonal $contratoPersonal */
        $contratoPersonal = ContratoPersonal::find($id);

        if (empty($contratoPersonal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contratoPersonals.singular')]));

            return redirect(route('contratoPersonals.index'));
        }

        $contratoPersonal->fill($request->all());
        $contratoPersonal->save();

        Flash::success(__('messages.updated', ['model' => __('models/contratoPersonals.singular')]));

        return redirect(route('contratoPersonals.index'));
    }

    /**
     * Remove the specified ContratoPersonal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContratoPersonal $contratoPersonal */
        $contratoPersonal = ContratoPersonal::find($id);

        if (empty($contratoPersonal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contratoPersonals.singular')]));

            return redirect(route('contratoPersonals.index'));
        }

        $contratoPersonal->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/contratoPersonals.singular')]));

        return redirect(route('contratoPersonals.index'));
    }
}
