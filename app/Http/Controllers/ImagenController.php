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
        // $evento_id = ($request->evento_id)? ($request->evento_id) : ('1');
        // if ($request->hasFile('files')) {  //existe un archivo con nombre <files>
        //     $files = $request->file('files'); //retorna un vector con los datos de los archivos
        //     dd($files);
        //     $data = array("evento_id" => $request['evento_id']);
        //     foreach ($files as $file) {                
        //         $data['pathPrivate'] = Storage::disk('s3')->put($evento_id, $file, 'public');
        //         $data['path'] = Storage::disk('s3')->url($data['pathPrivate']);
        //         Imagen::create($data);
        //     } 
        //     //Alert::success('Success Title', 'Success Message');
        // } else {
        //     //Alert::error('Success Title', 'Success Message');
        // }          

        // $request = $request->all();
        // if ($request['files']) {  //existe un archivo con nombre <files>
        //     $files = $request['files']; //$request->file('files'); //retorna un vector con los datos de los archivos
        //     $data = array("evento_id" => $request['evento_id']);
        //     foreach ($files as $file) {   
        //         $data['pathPrivate'] = Storage::disk('s3')->put($data['evento_id'], $file, 'public');
        //         $data['path'] = Storage::disk('s3')->url($data['pathPrivate']);                
        //         $imagen = Imagen::create($data);
        //     } 
        //     return response()->json(['message' => 'archivo subido con exito'], 406); 
        // } else {
        //     return response()->json(['message' => 'Faltan archivos'], 406);  
        // }

        // dd($request);
        // dd(array($request));
        // $a = array($request)[0];
        // dd($a);
        // dd( $request->all()['files']);
        // return $request->all();
        // $data = Http::asForm()->post('http://127.0.0.1:8000/api/subirFile', $request->all());
        $data = Http::withHeaders([
            'Content-Type' => 'multipart/form-data',
        ])->post('http://127.0.0.1:8000/api/imagenes-api', $request->all());
        // $data = Http::post('http://127.0.0.1:8000/api/subirFile', $request->all());
        return $data;
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
