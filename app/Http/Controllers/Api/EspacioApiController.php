<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EspacioResource;
use App\Models\Espacio;
use Illuminate\Http\Request;

class EspacioApiController extends Controller
{
    public function index()
    {
        $espacio = Espacio::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return EspacioResource::collection($espacio);
    }

    public function store(Request $request)
    {
        request()->validate(Espacio::$rules);
        $espacio = Espacio::create($request->all());
        return EspacioResource::make($espacio);
    }


    public function show($id)
    {
        $espacio = Espacio::included()->findOrFail($id);
        return EspacioResource::make($espacio);
    }

    public function update(Request $request,  $id)
    {
        $espacio = Espacio::findOrFail($id);
        request()->validate(Espacio::$rules);
        $espacio->update($request->all());
        $espacio->save();
        return EspacioResource::make($espacio);
    }

    public function destroy($id)
    {
        $espacio = Espacio::findOrFail($id);
        $espacio -> delete();
        return EspacioResource::make($espacio);
    }
}
