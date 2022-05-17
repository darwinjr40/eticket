<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\Sector;
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
        $espacios=Espacio::paginate(15);
        return view('espacios.index',compact('espacios'));
    }

    public function indexSector($id_sector){
        // $espacios = Espacio::paginate(10);
        $espacios = Espacio::all()->where('id_sector', $id_sector);
        return view('espacios.indexSector',compact('espacios', 'id_sector'));
    }

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
        $espacios->numero = $request->numero;
        $espacios->descripcion = $request->descripcion;
        $espacios->capacidad = $request->capacidad;
        $espacios->id_sector = $request->id_sector;
        $espacios->save();
        return redirect()->route('espacios.indexSector');
    }

    public function storeEspacioSector(Request $request, $id_sector)
    {
        $this->validate($request,[
            'numero'=>'required',
            'descripcion'=>'required',
            'capacidad'=>'required'
        ]);
        $espacios=new Espacio();
        $espacios->numero = $request->numero;
        $espacios->descripcion = $request->descripcion;
        $espacios->capacidad = $request->capacidad;
        $espacios->id_sector = $id_sector;
        $espacios->save();
        return back();
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
        return back();
        // return redirect()->route('espacios.indexSector');
    }
}
