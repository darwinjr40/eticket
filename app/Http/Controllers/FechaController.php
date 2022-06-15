<?php

namespace App\Http\Controllers;

use App\Models\Fecha;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechas=Fecha::paginate(10);
        return view('fechas.index',compact('fechas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fechas.create');
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
            'fechaHora'=>'required'
            ]);
        $fecha = Fecha::create($request->all());
        if ($request->id_ubicacion) {
            return back()->with('success', 'Fecha creada');
        } else {
            return redirect()->route('fechas.index')
                ->with('success', 'Fecha creada.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function show(Fecha $fecha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fecha=Fecha::find($id);
        return view('fechas.edit', compact('fecha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fecha $fecha)
    {
        $this->validate($request,[
            'fechaHora'=>'required'
            ]);
        $fecha->update($request->all());
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fecha=Fecha::find($id);
        $fecha->delete();
        return back();
    }
}
