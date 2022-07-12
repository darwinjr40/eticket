<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Response;

class ImagenController extends Controller
{
    public function index()
    {
        $url = config('services.endpoint.service').'/api/imagenes-api';
        // $files = Imagen::all();//File::whereUserId(Auth::id()) -> latest()->get();
        $coleccion = Http::get($url);
        $files = $coleccion["data"];
        return view('imagen.index', compact('files'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        if ($request->hasFile('files')) {  //existe un archivo con nombre <files>
            $imagen= [];
            $data = array("evento_id" => $request['evento_id']);
            $files = $request->file('files'); //retorna un object con los datos de los archivos
            foreach ($files as $file) {
                $data['pathPrivate'] = Storage::disk('s3')->put($data['evento_id'], $file, 'public');
                $data['path'] = Storage::disk('s3')->url($data['pathPrivate']);
                // $data['pathPrivate'] = '';
                // $data['path'] = '';
                $imagen[] = $data;
            }
            $request['datos'] = $imagen;
        }
        $url = config('services.endpoint.service').'/api/imagenes-api';
        $response = Http::post($url, $request->all());
        if (isset($response['errors'])) {
            return back()->withErrors($response->json()['errors']);
        } else {
            return back()->with('success', $response->json()['message']);
        }
    }


    public function show($id)
    {
        $url = config('services.endpoint.service').'/api/imagenes-api/'.$id;
        $data = Http::get($url);
        $imagen = $data->json();
        if (isset($imagen['errors'])) {
            abort(403);
        } else {
            return view('imagen.show', compact('imagen'));
        }
    }


    public function edit(Imagen $imagen)
    {
        return view('imagen.edit');
    }

    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    public function destroy( $id)
    {
        $url = config('services.endpoint.service').'/api/imagenes-api/'.$id;
        $response = Http::delete($url);
        if (isset($response['errors'])) {
            return back()->withErrors($response->json()['errors']);
        } else {
            return back()->with('success', $response->json()['message']);
        }
    }



}
