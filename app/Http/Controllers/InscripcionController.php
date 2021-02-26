<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscripcionRequest;
use App\Http\Requests\UpdateInscripcionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Inscripcion;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;

class InscripcionController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $inscripcions = Inscripcion::paginate(10);

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
        $propietarios = Propietario::all();
        return view('inscripcions.create',compact('propietarios'));
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
        try {
            DB::beginTransaction();
            $input = $request->all();
            /** @var Inscripcion $inscripcion */
            $inscripcion = Inscripcion::create($input);
            if($request->file('tarjeta_propiedad')){
                    
                $path = Storage::disk('public')->put('tarjetas_propiedad',$request->file('tarjeta_propiedad'));
                $inscripcion->fill(['tarjeta_propiedad'=>asset($path)])->save();
            }
            if($request->file('soat_afocat')){
                    
                $path = Storage::disk('public')->put('soats_afocats',$request->file('soat_afocat'));
                $inscripcion->fill(['soat_afocat'=>asset($path)])->save();
            }
            if($request->file('certificado_gps')){
                    
                $path = Storage::disk('public')->put('certificados_gps',$request->file('certificado_gps'));
                $inscripcion->fill(['certificado_gps'=>asset($path)])->save();
            }
            if($request->file('certificado_gas')){
                    
                $path = Storage::disk('public')->put('certificados_gas',$request->file('certificado_gas'));
                $inscripcion->fill(['certificado_gas'=>asset($path)])->save();
            }
            if($request->file('revision_tecnica')){
                    
                $path = Storage::disk('public')->put('revisiones_tecnicas',$request->file('revision_tecnica'));
                $inscripcion->fill(['revision_tecnica'=>asset($path)])->save();
            }
            
            if($request->estado=="1"){}
            $vehiculo = Vehiculo::create([
                'placa' => $request->placa,
                'color' => $request->color,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'inscripcion_id' => $inscripcion->id
            ]);
            return $vehiculo;
            DB::commit();
            Flash::success(__('messages.saved', ['model' => __('models/inscripcions.singular')]));
            return redirect(route('inscripcions.index'));
        } catch (\Throwable $th) {
            Flash::error(__('messages.error'));
            dd($th);
            return redirect(route('inscripcions.index'));
        }
        
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
        $propietarios = Propietario::all();
        return view('inscripcions.edit',compact('propietarios'))->with('inscripcion', $inscripcion);
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
        if($request->file('tarjeta_propiedad')){
                    
            $path = Storage::disk('public')->put('tarjetas_propiedad',$request->file('tarjeta_propiedad'));
            $inscripcion->fill(['tarjeta_propiedad'=>asset($path)])->save();
        }
        if($request->file('soat_afocat')){
                
            $path = Storage::disk('public')->put('soats_afocats',$request->file('soat_afocat'));
            $inscripcion->fill(['soat_afocat'=>asset($path)])->save();
        }
        if($request->file('certificado_gps')){
                
            $path = Storage::disk('public')->put('certificados_gps',$request->file('certificado_gps'));
            $inscripcion->fill(['certificado_gps'=>asset($path)])->save();
        }
        if($request->file('certificado_gas')){
                
            $path = Storage::disk('public')->put('certificados_gas',$request->file('certificado_gas'));
            $inscripcion->fill(['certificado_gas'=>asset($path)])->save();
        }
        if($request->file('revision_tecnica')){
                
            $path = Storage::disk('public')->put('revisiones_tecnicas',$request->file('revision_tecnica'));
            $inscripcion->fill(['revision_tecnica'=>asset($path)])->save();
        }
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
