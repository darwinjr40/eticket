<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectorResource;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorApiController extends Controller
{
    public function index()
    {
        $sector = Sector::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return SectorResource::collection($sector);
    }

    public function store(Request $request)
    {
        $date = request()->validate(Sector::$rules);
        $sector = Sector::create($request->all());
        return SectorResource::make($sector);
    }


    public function show($id)
    {
        $sector = Sector::included()->findOrFail($id);
        return SectorResource::make($sector);
    }

    public function update(Request $request,  $id)
    {
        $sector = Sector::findOrFail($id);
        request()->validate(Sector::$rules);
        $sector->update($request->all());
        $sector->save();
        return SectorResource::make($sector);
    }

    public function destroy($id)
    {
        $sector = Sector::findOrFail($id);
        $sector->delete();
        return SectorResource::make($sector);
    }
}
