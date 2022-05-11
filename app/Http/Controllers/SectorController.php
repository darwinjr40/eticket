<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors= Sector::paginate(5);
        return view('sectors.index',compact('sectors'));
    }

    public function indexUbicacion($id_ubicacion){
        $sectors=Sector::paginate(10);
        return view('sectors.indexUbicacion',compact('sectors', 'id_ubicacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sectors.create');
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
            'capacidad'=>'required',
            'referencia'=>'required'
        ]);

        Sector::create($request->all());
        return redirect()->route('sectors.index');
    }

    public function storeUbicacionSector(Request $request, $id_ubicacion)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'capacidad'=>'required',
            'referencia'=>'required'
        ]);
        $espacios=new Sector();
        $espacios->nombre = $request->nombre;
        $espacios->capacidad = $request->capacidad;
        $espacios->referencia = $request->referencia;
        $espacios->id_ubicacion = $id_ubicacion;
        $espacios->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        return view('sectors.edit',compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        request()->validate([
            'nombre'=>'required',
            'capacidad'=>'required',
            'referencia'=>'required'
        ]);

        $sector->update($request->all());
        return redirect()->route('sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->route('sectors.index');
    }
}
