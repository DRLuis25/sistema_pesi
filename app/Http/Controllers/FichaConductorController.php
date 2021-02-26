<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFichaConductorRequest;
use App\Http\Requests\UpdateFichaConductorRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Conductor;
use App\Models\FichaConductor;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;

class FichaConductorController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the FichaConductor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var FichaConductor $fichaConductors */
        $fichaConductors = FichaConductor::paginate(10);

        return view('ficha_conductors.index')
            ->with('fichaConductors', $fichaConductors);
    }

    /**
     * Show the form for creating a new FichaConductor.
     *
     * @return Response
     */
    public function create()
    {
        return view('ficha_conductors.create');
    }

    /**
     * Store a newly created FichaConductor in storage.
     *
     * @param CreateFichaConductorRequest $request
     *
     * @return Response
     */
    public function store(CreateFichaConductorRequest $request)
    {
        //return $request;
        try {
            DB::beginTransaction();
            $input = $request->all();
            /** @var FichaConductor $fichaConductor */
            $fichaConductor = FichaConductor::create($input);
            if($request->file('certificado_pnp')){
                
                $path = Storage::disk('public')->put('certificados_pnp',$request->file('certificado_pnp'));
                $fichaConductor->fill(['certificado_pnp'=>asset($path)])->save();
            }
            if($request->file('brevete')){
                
                $path = Storage::disk('public')->put('brevetes',$request->file('brevete'));
                $fichaConductor->fill(['brevete'=>asset($path)])->save();
            }
            if($request->file('fotocheck')){
                
                $path = Storage::disk('public')->put('fotochecks',$request->file('fotocheck'));
                $fichaConductor->fill(['fotocheck'=>asset($path)])->save();
            }
            if($request->file('recibo')){
                
                $path = Storage::disk('public')->put('recibos',$request->file('recibo'));
                $fichaConductor->fill(['recibo'=>asset($path)])->save();
            }
            if($request->file('foto')){
                
                $path = Storage::disk('public')->put('fotos_conductor',$request->file('foto'));
                $fichaConductor->fill(['foto'=>asset($path)])->save();
            }
            if ($request->estado=="1") {
                $conductor = Conductor::create([
                    'ficha_conductor_id' => $fichaConductor->id,
                    'fecha_contrato' => date('Y-m-d', time()),
                ]);
            }
            DB::commit();
            Flash::success(__('messages.saved', ['model' => __('models/fichaConductors.singular')]));
            return redirect(route('fichaConductors.index'));
        } catch (\Throwable $th) {
            Flash::error(__('messages.error'));
            //dd($th);
            return redirect(route('fichaConductors.index'));
        }
        
        
    }

    /**
     * Display the specified FichaConductor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FichaConductor $fichaConductor */
        $fichaConductor = FichaConductor::find($id);

        if (empty($fichaConductor)) {
            Flash::error(__('models/fichaConductors.singular').' '.__('messages.not_found'));

            return redirect(route('fichaConductors.index'));
        }

        return view('ficha_conductors.show')->with('fichaConductor', $fichaConductor);
    }

    /**
     * Show the form for editing the specified FichaConductor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var FichaConductor $fichaConductor */
        $fichaConductor = FichaConductor::find($id);

        if (empty($fichaConductor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichaConductors.singular')]));

            return redirect(route('fichaConductors.index'));
        }

        return view('ficha_conductors.edit')->with('fichaConductor', $fichaConductor);
    }

    /**
     * Update the specified FichaConductor in storage.
     *
     * @param int $id
     * @param UpdateFichaConductorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFichaConductorRequest $request)
    {
        /** @var FichaConductor $fichaConductor */
        $fichaConductor = FichaConductor::find($id);

        if (empty($fichaConductor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichaConductors.singular')]));

            return redirect(route('fichaConductors.index'));
        }

        $fichaConductor->fill($request->all());
        $fichaConductor->save();
        if($request->file('certificado_pnp')){
                
            $path = Storage::disk('public')->put('certificados_pnp',$request->file('certificado_pnp'));
            $fichaConductor->fill(['certificado_pnp'=>asset($path)])->save();
        }
        if($request->file('brevete')){
            
            $path = Storage::disk('public')->put('brevetes',$request->file('brevete'));
            $fichaConductor->fill(['brevete'=>asset($path)])->save();
        }
        if($request->file('fotocheck')){
            
            $path = Storage::disk('public')->put('fotochecks',$request->file('fotocheck'));
            $fichaConductor->fill(['fotocheck'=>asset($path)])->save();
        }
        if($request->file('recibo')){
            
            $path = Storage::disk('public')->put('recibos',$request->file('recibo'));
            $fichaConductor->fill(['recibo'=>asset($path)])->save();
        }
        if($request->file('foto')){
            
            $path = Storage::disk('public')->put('fotos_conductor',$request->file('foto'));
            $fichaConductor->fill(['foto'=>asset($path)])->save();
        }
        Flash::success(__('messages.updated', ['model' => __('models/fichaConductors.singular')]));

        return redirect(route('fichaConductors.index'));
    }

    /**
     * Remove the specified FichaConductor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FichaConductor $fichaConductor */
        $fichaConductor = FichaConductor::find($id);

        if (empty($fichaConductor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichaConductors.singular')]));

            return redirect(route('fichaConductors.index'));
        }

        $fichaConductor->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/fichaConductors.singular')]));

        return redirect(route('fichaConductors.index'));
    }
}
