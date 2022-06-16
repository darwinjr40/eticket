<?php

namespace App\Http\Controllers;
//use Spatie\Permission\Models\Permission;

use App\Models\permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('acceso-permisos'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $permission=permiso::paginate(5);
        return view('permisos.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('acceso-permisos'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required'
        ]);

        permiso::create($request->all());
        return redirect()->route('permisos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('acceso-permisos'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $permission=permiso::find($id);
        return view('permisos.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, permiso $permission)
    {
        request()->validate([
            'name'=>'required'
        ]);
        $permission->update($request->all());
        return redirect()->route('permisos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(permiso $permission)
    {
        $permission->delete();
        return redirect()->route('permisos.index');
    }
}
