<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\EventoUser;
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
        $rol_empleado = User::EMPLEADO; 
        return view('usuarios.index',compact('usuarios','rol_empleado'));
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
        // return $request;
        // return $request->input('roles');
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


    public function addEvento($user_id)
    {
        $eventos = Evento::all();
        $eventos_id =  EventoUser::where('user_id', $user_id)->pluck('evento_id')->all();
        return view('usuarios.addEvento', compact('eventos', 'eventos_id', 'user_id'));
    }

    public function UserEventoStore(Request $request, $user_id)
    {
        if (isset($request->eventos)) { //existen eventos desde el form
            //eliminar eventos
            $eventos_eliminar = Evento::whereNotIn('id', $request['eventos'])->get();
            foreach ($eventos_eliminar as $evento) {
                $existe = EventoUser::where('user_id',$user_id)->where('evento_id', $evento['id'])->first();
                if ($existe)  $existe->delete();
            }
            //adiccionar nuevos eventos
            foreach ($request['eventos'] as $evento_id) {
                $existe = EventoUser::where('user_id',$user_id)->where('evento_id', $evento_id)->first();
                if (! $existe) {
                    EventoUser::create([
                        'user_id' => $user_id,
                        'evento_id' => $evento_id,
                        'fecha' => now()->format("Y-m-d H:i:s"),
                    ]);
                }
            }
        } else {
            $eventos_eliminar =  Evento::all();
            foreach ($eventos_eliminar as $evento) {
                $existe = EventoUser::where('user_id',$user_id)->where('evento_id', $evento['id'])->first();
                if ($existe)  $existe->delete();
            }
        }
        return redirect()->route('usuarios.index');        
    }

}
