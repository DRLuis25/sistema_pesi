<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use App\Repositories\UsuariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UsuariosController extends AppBaseController
{
    
    /** @var  UsuariosRepository */
    private $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepo)
    {
        $this->middleware('auth');
        $this->usuariosRepository = $usuariosRepo;
    }

    /**
     * Display a listing of the Usuarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuariosRepository->paginate(10);

        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new Usuarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created Usuarios in storage.
     *
     * @param CreateUsuariosRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuariosRequest $request)
    {
        $input = $request->all();

        $usuarios = $this->usuariosRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/usuarios.singular')]));

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usuarios.singular')]));

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for editing the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usuarios.singular')]));

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.edit')->with('usuarios', $usuarios);
    }

    /**
     * Update the specified Usuarios in storage.
     *
     * @param int $id
     * @param UpdateUsuariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuariosRequest $request)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usuarios.singular')]));

            return redirect(route('usuarios.index'));
        }

        $usuarios = $this->usuariosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/usuarios.singular')]));

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified Usuarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usuarios.singular')]));

            return redirect(route('usuarios.index'));
        }

        $this->usuariosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/usuarios.singular')]));

        return redirect(route('usuarios.index'));
    }
}
