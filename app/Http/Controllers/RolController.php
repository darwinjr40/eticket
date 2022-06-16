<?php

namespace App\Http\Controllers;

use App\Models\permiso;
use App\Models\rol;
use App\Models\rolPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RolController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol',['only'=>['index']]);
    //     $this->middleware('permission:crear-rol',['only'=>['create','store']]);
    //     $this->middleware('permission:editar-rol',['only'=>['edit','update']]);
    //     $this->middleware('permission:borrar-rol',['only'=>['destroy']]);


    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('acceso-rol'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $roles= rol::paginate(5);
        $permission=permiso::get();
        return view('roles.index',compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('acceso-rol'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $permission = permiso::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required',
        'permission'=>'required'
        ]);

        $role=rol::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
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
        abort_if(Gate::denies('acceso-rol'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $role=rol::find($id);
        $permission=permiso::get();
        $rolePermissions=rolpermiso::where('rolpermiso.rol_id',$id)->pluck('rolpermiso.permission_id')->all();
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //dd($request->permisos);
        $this->validate($request,[
            'name'=>'required',
            'permission'=>'required'
        ]);

        $role=rol::find($id);
        $role->name=$request->input('name');
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rol')->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
