<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::paginate(10);
        $clientes= Cliente::paginate(10);
        return view('clientes.index', compact('user','clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'email'=>'required|email|unique:users,email'
        ]);
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);
        //$user=User::create($request->all());
        $cliente= new Cliente ();
        $cliente ->id= $user->id;
        $cliente -> telefono = $request->get('telefono');
        $cliente -> save();
        return redirect()->route('eventosS');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $cliente = Cliente::findOrFail($id);
        $user = User::findOrFail($id);
        return view('clientes.edit',compact('cliente','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'telefono'=>'required'
        ]);
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();
        User::find($id)->delete();
        return redirect()->route('clientes.index');
    }
}
