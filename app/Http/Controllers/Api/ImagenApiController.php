<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImagenResource;
use App\Models\Imagen;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenApiController extends Controller
{
    public function index()
    {
        $imagen = Imagen::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return ImagenResource::collection($imagen);
    }

    
    public function subirFile(Request $request)
    {
        try {
            if ($request->hasFile('files')) {  //existe un archivo con nombre <files>
                $files = $request->file('files'); //retorna un vector con los datos de los archivos
                $data = array("evento_id" => $request['evento_id']);
                foreach ($files as $file) {
                    $data['pathPrivate'] = Storage::disk('s3')->put($data['evento_id'], $file, 'public');
                    $data['path'] = Storage::disk('s3')->url($data['pathPrivate']);
                    Imagen::create($data);
                }
                return response()->json(['message' => 'archivo subido con exito1'], 200);
            } else {
                // return response()->json(['message' => $request], 406);
                return response()->json(['message' => 'Faltan archivos1'], 406);
            }
        } catch (Exception  $e) {
            return response()->json(['message' => 'Error al subir el archivo'], 406);
        }
    }
    public function store(Request $request)
    {

        request()->validate(Imagen::$rules);
        try {
            if ($request->hasFile('files')) {  //existe un archivo con nombre <files>
                $files = $request->file('files'); //retorna un vector con los datos de los archivos
                $data = array("evento_id" => $request['evento_id']);
                foreach ($files as $file) {
                    $data['pathPrivate'] = Storage::disk('s3')->put($data['evento_id'], $file, 'public');
                    $data['path'] = Storage::disk('s3')->url($data['pathPrivate']);
                    Imagen::create($data);
                }
                return response()->json(['message' => 'archivo subido con exito'], 200);
            } else {
                return response()->json(['message' => 'Faltan archivos'], 406);
            }
        } catch (Exception  $e) {
            return response()->json(['message' => 'Error al subir el archivo'], 406);
        }

    }


    public function show($id)
    {
        $imagen = Imagen::included()->findOrFail($id);
        return ImagenResource::make($imagen);
    }

    public function update(Request $request,  $id)
    {
        $imagen = Imagen::findOrFail($id);
        request()->validate(Imagen::$rules);
        $imagen->update($request->all());
        $imagen->save();
        return ImagenResource::make($imagen);
    }

    public function destroy($id)
    {
        $imagen = Imagen::findOrFail($id);
        try {
            if ($imagen->pathPrivate) {
                Storage::disk('s3')->delete($imagen->pathPrivate);
                $imagen->delete();
                return ImagenResource::make($imagen);
            } else {
                return response()->json(['message' => 'Error al subir el archivo'], 403);
            }
        } catch (Exception  $e) {
            return response()->json(['message' => 'Error al subir el archivo'], 406);
        }
    }
}
