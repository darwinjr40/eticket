<?php

namespace App\Http\Controllers;

use App\Models\rol;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('ver-users'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $usuarios= User::paginate(5);
        $roles = rol::paginate(5);
        return view('usuarios.index',compact('usuarios','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('crear-users'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $roles=rol::pluck('name','name')->all();
        return view('usuarios.create',compact('roles'));

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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:confirm-password',
            'roles'=>'required'
        ]);

        return $request->input('roles');
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index');
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
        abort_if(Gate::denies('editar-users'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $user=User::find($id);
        $roles=rol::pluck('name','name')->all();

        return view('usuarios.edit',compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);

        $input=$request->all();
        if (!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }else{
            $input=Arr::except($input,array('password'));
        }


        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
