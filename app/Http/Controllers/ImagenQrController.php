<?php

namespace App\Http\Controllers;

use App\Models\ImagenQr;
use Illuminate\Http\Request;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ImagenQrController extends Controller
{

    public function guardar()
    {
        QrCode::format('png')->size(100)->generate('Make me into a QrCode!','../public/qrcodes/q.png');

        //guardamos la url del archivo 
        return public_path().'/qrcodes/q.png';

        $url = public_path().'/qrcodes/q.png';
        $file = $this->pathToUploadedFile($url);
        //crea el archiva en aws
        $pathNube = Storage::disk('s3')->put('qr', $file, 'public');
        $inquiry->path =  Storage::disk('s3')->url($pathNube);
        $inquiry->pathLocal =  'storage/'.$inquiry_id.'/'.$name_file;
        $inquiry->name_file = $name_file;
        $inquiry->fecha_file = date('d-m-y H:i:s', time());
        $inquiry->save();
        return redirect()->route('patients.show', $patient['id'])->with('info', 'Guardado Exitosamente');
    }

    public function pathToUploadedFile( $path, $test = true ) {
        $filesystem = new Filesystem;
        
        $name = $filesystem->name( $path );
        $extension = $filesystem->extension( $path );
        $originalName = $name . '.' . $extension;
        $mimeType = $filesystem->mimeType( $path );
        $error = null;    
        return new UploadedFile( $path, $originalName, $mimeType, $error, $test );
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
    }

    public function show(ImagenQr $imagenQr)
    {
        //
    }

    public function edit(ImagenQr $imagenQr)
    {
        //
    }

    public function update(Request $request, ImagenQr $imagenQr)
    {
        //
    }

    public function destroy(ImagenQr $imagenQr)
    {
        //
    }
}
