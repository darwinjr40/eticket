<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    
    public function index()
    {
        $files = Imagen::all();//File::whereUserId(Auth::id()) -> latest()->get();
        return view('imagen.index', compact('files')); 
    }

    public function create()
    {
        return view('imagen.create');
    }

    public function store(Request $request)
    {
        $evento_id = ($request->evento_id)? ($request->evento_id) : ('1');
        $files = $request->file('files'); //retorna un vector con los datos de los archivos
        if ($request->hasFile('files')) {  //existe un archivo con nombre <files>
            foreach ($files as $file) {
                
                
                $pathPrivate = Storage::disk('s3')->put($evento_id, $file, 'public');
                $path= Storage::disk('s3')->url($pathPrivate);
                Imagen::create([
                    'path' => $path,
                    'pathPrivate' => $pathPrivate,
                    'evento_id' => $evento_id
                ]);
            } 
            //Alert::success('Success Title', 'Success Message');
        } else {
            //Alert::error('Success Title', 'Success Message');
        }          
        return back();
    }


    public function show(Imagen $imagen)
    {
        
        if ($imagen->path) {
            return view('imagen.show', compact('imagen'));
        } else {
            abort(403);
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

    public function destroy(Imagen $imagen)
    {

        if ($imagen->pathPrivate) {
            Storage::disk('s3')->delete($imagen->pathPrivate);
            $imagen->delete();
        } else {
            abort(403);
        }
        return back();
    }
}
