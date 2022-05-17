<?php

namespace App\Http\Controllers;

use App\Models\categoriaEvento;
use Illuminate\Http\Request;

class CategoriaEventoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-categoriaEvento | crear-categoriaEvento | editar-categoriaEvento | borrar-categoriaEvento',['only'=>['index']]);
        $this->middleware('permission:crear-categoriaEvento',['only'=>['create','store']]);
        $this->middleware('permission:editar-categoriaEvento',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-categoriaEvento',['only'=>['destroy']]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=categoriaEvento::paginate(5);
        return view('categoriaEventos.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriaEventos.create');
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
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);

        categoriaEvento::create($request->all());
        // return redirect()->route('categoriaEventos.index');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoriaEvento  $categoriaEvento
     * @return \Illuminate\Http\Response
     */
    public function show(categoriaEvento $categoriaEvento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoriaEvento  $categoriaEvento
     * @return \Illuminate\Http\Response
     */
    public function edit(categoriaEvento $categoriaEvento)
    {
        return view('categoriaEventos.edit',compact('categoriaEvento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoriaEvento  $categoriaEvento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoriaEvento $categoriaEvento)
    {
        request()->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);

        $categoriaEvento->update($request->all());
        return redirect()->route('categoriaEventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoriaEvento  $categoriaEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoriaEvento $categoriaEvento)
    {
        $categoriaEvento->delete();
        return redirect()->route('categoriaEventos.index');
    }
}
