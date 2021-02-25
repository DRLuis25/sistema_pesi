<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Personal;
use Illuminate\Http\Request;
use Flash;
use Response;

class PersonalController extends AppBaseController
{
    /**
     * Display a listing of the Personal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Personal $personals */
        $personals = Personal::all();

        return view('personals.index')
            ->with('personals', $personals);
    }

    /**
     * Show the form for creating a new Personal.
     *
     * @return Response
     */
    public function create()
    {
        return view('personals.create');
    }

    /**
     * Store a newly created Personal in storage.
     *
     * @param CreatePersonalRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalRequest $request)
    {
        $input = $request->all();

        /** @var Personal $personal */
        $personal = Personal::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/personals.singular')]));

        return redirect(route('personals.index'));
    }

    /**
     * Display the specified Personal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Personal $personal */
        $personal = Personal::find($id);

        if (empty($personal)) {
            Flash::error(__('models/personals.singular').' '.__('messages.not_found'));

            return redirect(route('personals.index'));
        }

        return view('personals.show')->with('personal', $personal);
    }

    /**
     * Show the form for editing the specified Personal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Personal $personal */
        $personal = Personal::find($id);

        if (empty($personal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

            return redirect(route('personals.index'));
        }

        return view('personals.edit')->with('personal', $personal);
    }

    /**
     * Update the specified Personal in storage.
     *
     * @param int $id
     * @param UpdatePersonalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalRequest $request)
    {
        /** @var Personal $personal */
        $personal = Personal::find($id);

        if (empty($personal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

            return redirect(route('personals.index'));
        }

        $personal->fill($request->all());
        $personal->save();

        Flash::success(__('messages.updated', ['model' => __('models/personals.singular')]));

        return redirect(route('personals.index'));
    }

    /**
     * Remove the specified Personal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Personal $personal */
        $personal = Personal::find($id);

        if (empty($personal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

            return redirect(route('personals.index'));
        }

        $personal->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/personals.singular')]));

        return redirect(route('personals.index'));
    }
}
