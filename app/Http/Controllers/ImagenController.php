<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    
    public function index()
    {
        // $files = Imagen::all();//File::whereUserId(Auth::id()) -> latest()->get();
        $coleccion = Http::get('http://127.0.0.1:8000/api/imagenes-api');        
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
        $response = Http::post('http://127.0.0.1:8000/api/imagenes-api', $request->all());
        if (isset($response['errors'])) {
            return back()->withErrors($response->json()['errors']);  
        } else {
            return back()->with('success', $response->json()['message']);
        }        
    }


    public function show($id)
    {
        $data = Http::get('http://127.0.0.1:8000/api/imagenes-api/'.$id); 
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
        $response = Http::delete('http://127.0.0.1:8000/api/imagenes-api/'.$id);
        if (isset($response['errors'])) {
            return back()->withErrors($response->json()['errors']);  
        } else {
            return back()->with('success', $response->json()['message']);
        }       
    }
}
