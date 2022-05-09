<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UbicacionController extends Controller
{

    public function index()
    {
        $coleccion = Http::get('http://192.168.1.2:8080/tiendatopicos/public/api/ubicaciones');
        $ubicacions = $coleccion["data"];
        return view('ubicacion.index', compact('ubicacions'));
        // $ubicacions = Ubicacion::paginate();
        // return view('ubicacion.index', compact('ubicacions'));
        // $coleccion = (array)json_decode($coleccion);
        // return $ubicacion;
        // $ubicacions = Ubicacion::hydrate($coleccion["data"]);
        // $ubicacions = $ubicacions->flatten();
    }
    public function create()
    {
        $ubicacion = new Ubicacion();
        return view('ubicacion.create', compact('ubicacion'));
    }

    public function store(Request $request)
    {
        // request()->validate(Ubicacion::$rules);
        // $ubicacion = Ubicacion::create($request->all());
        Http::withHeaders([
            'Accept' => 'application/json',
        ])->post('http://192.168.1.2:8080/tiendatopicos/public/api/ubicaciones', $request->all());
        if ($request->evento_id) {
            // $evento = Evento::find($request->evento_id);
            // return redirect()->route('eventos.edit', $evento);
            return back()->with('success', 'Ubicacion creada.');
        } else {
            return redirect()->route('ubicacions.index')
                ->with('success', 'Ubicacion creada.');
        }
    }

    public function show($id)
    {
        // $ubicacion = Ubicacion::find($id);
        $coleccion = Http::get('http://192.168.1.2:8080/tiendatopicos/public/api/ubicaciones/'.$id);
        $ubicacion = $coleccion["data"];
        // return $ubicacion;
        return view('ubicacion.show', compact('ubicacion'));
    }

    public function edit($id)
    {
        // $ubicacion = Ubicacion::find($id);
        $coleccion = Http::get('http://192.168.1.2:8080/tiendatopicos/public/api/ubicaciones/'.$id);
        $ubicacion = $coleccion["data"];
        return view('ubicacion.edit', compact('ubicacion'));
    }

    public function update(Request $request,  $id)
    {
        // return $request;
        Http::withHeaders([
            'Accept' => 'application/json',
        ])->patch('http://192.168.1.2:8080/tiendatopicos/public/api/ubicaciones/'.$id, $request->all());
        // request()->validate(Ubicacion::$rules);
        // $ubicacion->update($request->all());
        if ($request->evento_id) {
            return back()->with('success', 'Ubicacion actualizada.');
        } else {
            return redirect()->route('ubicacions.index')
                ->with('success', 'Ubicacion actualizada.');
        }
    }

    public function destroy($id)
    {
        // $ubicacion = Ubicacion::find($id)->delete();
        $coleccion = Http::delete('http://192.168.1.2:8080/tiendatopicos/public/api/ubicaciones/'.$id);
        return redirect()->route('ubicacions.index')
            ->with('success', 'Ubicacion eliminada');
    }

    public function mapa()
    {
        return view('ubicacion.mapa21');
    }
}
