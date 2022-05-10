<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use Illuminate\Http\Request;

class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espacios=Espacio::paginate(5);
        return view('espacios.index',compact('espacios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('espacios.create');
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
            'numero'=>'required',
            'descripcion'=>'required',
            'capacidad'=>'required'
        ]);
        $espacios=new Espacio();
        $espacios->numero=$request->get('numero');
        $espacios->descripcion=$request->get('descripcion');
        $espacios->capacidad=$request->get('capacidad');
        $espacios->id_sector=$request->get('id_sector');
        $espacios->save();
        return back();
        return redirect()->route('espacios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function show(Espacio $espacio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function edit(Espacio $espacio)
    {
        return view('espacios.edit',compact('espacio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espacio $espacio)
    {
        request()->validate([
            'numero'=>'required',
            'descripcion'=>'required',
            'capacidad'=>'required'
        ]);

        $espacio->update($request->all());
        return redirect()->route('espacios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espacio $espacio)
    {
        $espacio->delete();
        return redirect()->route('espacios.index');
    }
}
