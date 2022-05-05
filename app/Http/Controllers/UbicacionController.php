<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

/**
 * Class UbicacionController
 * @package App\Http\Controllers
 */
class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacions = Ubicacion::paginate();

        return view('ubicacion.index', compact('ubicacions'))
            ->with('i', (request()->input('page', 1) - 1) * $ubicacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion = new Ubicacion();
        return view('ubicacion.create', compact('ubicacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ubicacion::$rules);

        $ubicacion = Ubicacion::create($request->all());

        return redirect()->route('ubicacions.index')
            ->with('success', 'Ubicacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);

        return view('ubicacion.show', compact('ubicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);

        return view('ubicacion.edit', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ubicacion $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        request()->validate(Ubicacion::$rules);

        $ubicacion->update($request->all());

        return redirect()->route('ubicacions.index')
            ->with('success', 'Ubicacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id)->delete();

        return redirect()->route('ubicacions.index')
            ->with('success', 'Ubicacion deleted successfully');
    }
}
