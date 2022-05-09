<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

/**
 * Class UbicacionController
 * @package App\Http\Controllers
 */
class UbicacionController extends Controller
{

    public function index()
    {
        $ubicacions = Ubicacion::paginate();
        // return $ubicacions;
        return view('ubicacion.index', compact('ubicacions'))
            ->with('i');
            // ->with('i', (request()->input('page', 1) - 1) * $ubicacions->perPage());
    }
    public function create()
    {
        $ubicacion = new Ubicacion();
        // dd($ubicacion);
        return view('ubicacion.create', compact('ubicacion'));
    }

    public function store(Request $request)
    {
        request()->validate(Ubicacion::$rules);
        $ubicacion = Ubicacion::create($request->all());
        if ($request->evento_id) {
            $evento = Evento::find($request->evento_id);
            return redirect()->route('eventos.edit', $evento);
        } else {
            return redirect()->route('ubicacions.index')
                ->with('success', 'Ubicacion creada.');
        }
        return back();
    }

    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion.show', compact('ubicacion'));
    }

    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion.edit', compact('ubicacion'));
    }

    public function update(Request $request, Ubicacion $ubicacion)
    {
        request()->validate(Ubicacion::$rules);
        $ubicacion->update($request->all());

        return redirect()->route('ubicacions.index')
            ->with('success', 'Ubicacion actualizada');
    }

    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id)->delete();

        return redirect()->route('ubicacions.index')
            ->with('success', 'Ubicacion eliminada');
    }

    public function mapa()
    {
        return view('ubicacion.mapa21');
    }
}
