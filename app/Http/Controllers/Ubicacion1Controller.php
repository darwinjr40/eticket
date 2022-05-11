<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Ubicacion1Controller extends Controller
{
    public function index()
    {
        $ubicacions = Ubicacion::paginate();
        return view('ubicacion.index', compact('ubicacions'));
    }
    public function create()
    {
        $ubicacion = new Ubicacion();
        return view('ubicacion.create', compact('ubicacion'));
    }

    public function store(Request $request)
    {
        // request()->validate(Ubicacion::$rules);
        // Ubicacion::create($request->all());
        $json = json_encode($request->all());
        $json = json_decode($json);
        return $json;
        if ($request->evento_id) {
            return back()->with('success', 'Ubicacion creada.');
        } else {
            return redirect()->route('ubicacions.index')
                ->with('success', 'Ubicacion creada.');
        }
    }

    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion.show', compact('ubicacion'));
    }

    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);
        //$fechas=$ubicacion->fechas;
        $fechas=DB::table('fechas')->where('id_ubicacion',$id)->get();
        return view('ubicacion.edit', compact('ubicacion','fechas'));
    }

    
    public function editEvento($id)
    {
        $ubicacion = Ubicacion::find($id);
        $fechas=DB::table('fechas')->where('id_ubicacion',$id)->get();
        return view('ubicacion.editEvento', compact('ubicacion','fechas'));
    }

    public function update(Request $request,  $id)
    {       
        request()->validate(Ubicacion::$rules);
        $ubicacion = Ubicacion::find($id);
        $ubicacion->update($request->all());
        if ($request->evento_id) {
            return redirect()->route('eventos.edit', Evento::find($ubicacion['evento_id']))->with('success', 'Ubicacion actualizada.');
        } else {
            return redirect()->route('ubicacions.index')
                ->with('success', 'Ubicacion actualizada.');
        }
    }

    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id);
        $evento_id = $ubicacion['evento_id'];
        $ubicacion->delete();
        return redirect()->route('eventos.edit', Evento::find($evento_id))->with('success', 'Ubicacion eliminada.');
    }
}
