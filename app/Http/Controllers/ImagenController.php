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
        return view('imagen.create');
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'multipart/form-data',
        ])->post('http://127.0.0.1:8000/api/imagenes-api', $request->all());
        $s = $response->status();
        if (($s >=400) && ($s <= 599)) {
            return back()->withErrors($response->json()['errors']);            
        } 
        return back()->with('success', 'Archivo Guardado.');
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
        $data = Http::delete('http://127.0.0.1:8000/api/imagenes-api/'.$id);
        return back()->with('success', 'Archivo eliminado.');
    }
}
