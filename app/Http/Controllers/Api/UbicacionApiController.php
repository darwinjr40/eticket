<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UbicacionResource;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionApiController extends Controller
{
    public function index()
    {
        $ubicacion = Ubicacion::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return UbicacionResource::collection($ubicacion);
    }

    public function store(Request $request)
    {
        request()->validate(Ubicacion::$rules);
        $ubicacion = Ubicacion::create($request->all());
        return UbicacionResource::make($ubicacion);
    }


    public function show($id)
    {
        $ubicacion = Ubicacion::included()->findOrFail($id);
        return UbicacionResource::make($ubicacion);
    }

    public function update(Request $request,  $id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        request()->validate(Ubicacion::$rules);
        $ubicacion->update($request->all());
        $ubicacion->save();
        return UbicacionResource::make($ubicacion);
    }

    public function destroy($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion -> delete();
        return UbicacionResource::make($ubicacion);
    }
}
