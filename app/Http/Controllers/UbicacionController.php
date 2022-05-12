<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fecha;
use Illuminate\Support\Facades\DB;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UbicacionController extends Controller
{

    public function index()
    {
        // $coleccion = Http::get('http://193.123.108.26/api/ubicaciones');
        $coleccion = Http::get('http://localhost:8080/tiendatopicos/public/api/ubicaciones');        
        $ubicacions = $coleccion["data"];
        return view('ubicacion.index', compact('ubicacions'));
    }

    public function create()
    {
        $ubicacion = new Ubicacion();
        return view('ubicacion.create', compact('ubicacion'));
    }

    public function store(Request $request)
    {
        request()->validate(Ubicacion::$rules);
        $data = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post('http://localhost:8080/tiendatopicos/public/api/ubicaciones', $request->all());
        // ])->post('http://193.123.108.26/api/ubicaciones', $request->all());
        // $mensaje = ($data['errors'])? 'error rellenar Ubicacion.' : 'Ubicacion creada.';
        if ($request->evento_id) {
            return back()->with('success', 'Ubicacion creada.');
        } else {
            return redirect()->route('ubicacions.index')
                ->with('success', 'Ubicacion creada.');
        }
    }

    public function show($id)
    {
        // $coleccion = Http::get('http://193.123.108.26/api/ubicaciones/'.$id);
        $coleccion = Http::get('http://localhost:8080/tiendatopicos/public/api/ubicaciones/'.$id);        
        $ubicacion = $coleccion["data"];
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
        $coleccion = Http::get('http://localhost:8080/tiendatopicos/public/api/ubicaciones/'.$id);        
        $ubicacion = $coleccion["data"];
        $fechas=DB::table('fechas')->where('id_ubicacion',$id)->get();
        return view('ubicacion.editEvento', compact('ubicacion','fechas'));
    }

    public function update(Request $request,  $id)
    {
        request()->validate(Ubicacion::$rules);
        $data = Http::withHeaders([
            'Accept' => 'application/json',
        ])->patch('http://localhost:8080/tiendatopicos/public/api/ubicaciones/'.$id, $request->all());
        // ])->patch('http://193.123.108.26/api/ubicaciones/'.$id, $request->all());
        // $mensaje = ($data['errors'])? 'error rellenar Ubicacion.' : 'Ubicacion actualizada.';
        if ($request->evento_id) {
            return back()->with('success', 'ubicacion actualizada');
        } else {
            return redirect()->route('ubicacions.index')
                ->with('success', 'ubicacion actualizada');
        }
    }

    public function destroy($id)
    {
        // $coleccion = Http::delete('http://193.123.108.26/api/ubicaciones/'.$id);
        Http::delete('http://localhost:8080/tiendatopicos/public/api/ubicaciones/'.$id);
        return back()->with('success', 'Ubicacion eliminada.');
    }

    public function mapa()
    {
        return view('ubicacion.mapa21');
    }
}
