<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\ContratoPersonal;
use App\Models\Personal;
use App\Models\Usuarios;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class PersonalController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        //return $request;
        try {
            DB::beginTransaction();
            $input = $request->all();

            /** @var Personal $personal */
            $personal = Personal::create($input);
            //Registrar Contrato
            $contrato = ContratoPersonal::create([
                'personal_id' => $personal->id,
                'fecha_contrato' => $request->fecha_contrato,
                'tiempo' => $request->tiempo,
                'sueldo' => $request->sueldo,
            ]);
            $usuario = Usuarios::create([
                'email' => $request->email,
                'contrato_personal_id' => $contrato->id,
                'password' => '$2y$10$cuf37o9lN0IkRFv73Q7IB.c5bDqCvog845XuTKHxSbMep/D04mknG',
            ]);
            if($request->tipo=="2"){
                $user = User::where('id','=',$usuario->id)->first();
                $user->assignRole('Gerente');
            }
            elseif ($request->tipo=="3") {
                $user = User::where('id','=',$usuario->id)->first();
                $user->assignRole('Administrador');
            }
            elseif ($request->tipo=="1") {
                $user = User::where('id','=',$usuario->id)->first();
                $user->assignRole('Operador');
            }
            DB::commit();
            Flash::success(__('messages.saved', ['model' => __('models/personals.singular')]));
            return redirect(route('personals.index'));
        } catch (\Throwable $th) {
        Flash::error(__('messages.error'));
        dd($th);
        return redirect(route('personals.index'));
    }
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
        try {
            DB::beginTransaction();
            /** @var Personal $personal */
            $personal = Personal::find($id);
            if (empty($personal)) {
                Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

                return redirect(route('personals.index'));
            }
            $personal->fill($request->all());
            $personal->save();
            $contratoPersonal = ContratoPersonal::where('personal_id','=',$personal->id)->first();
            $usuario = Usuarios::where('contrato_personal_id','=',$contratoPersonal->id)->first();
            $user = User::where('id','=',$usuario->id)->first();
            if($request->tipo=="2"){
                
                $user->roles()->detach();
                $user->assignRole('Gerente');
            }
            elseif ($request->tipo=="3") {
                $user->roles()->detach();
                $user->assignRole('Administrador');
            }
            elseif ($request->tipo=="1") {
                $user->roles()->detach();
                $user->assignRole('Operador');
            }
            DB::commit();
            Flash::success(__('messages.updated', ['model' => __('models/personals.singular')]));
            return redirect(route('personals.index'));
        } catch (\Throwable $th) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));
            return redirect(route('personals.index'));
        }
        
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
