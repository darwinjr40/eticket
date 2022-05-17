<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FechaResource;
use App\Models\Fecha;
use Illuminate\Http\Request;

class FechaApiController extends Controller
{
    public function index()
    {
        $fecha = Fecha::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return FechaResource::collection($fecha);
    }

    public function store(Request $request)
    {
        $date = request()->validate(Fecha::$rules);
        $fecha = Fecha::create($request->all());
        return FechaResource::make($fecha);
    }


    public function show($id)
    {
        $fecha = Fecha::included()->findOrFail($id);
        return FechaResource::make($fecha);
    }

    public function update(Request $request,  $id)
    {
        $fecha = Fecha::findOrFail($id);
        request()->validate(Fecha::$rules);
        $fecha->update($request->all());
        $fecha->save();
        return FechaResource::make($fecha);
    }

    public function destroy($id)
    {
        $fecha = Fecha::findOrFail($id);
        $fecha->delete();
        return FechaResource::make($fecha);
    }
}
