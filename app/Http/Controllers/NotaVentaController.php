<?php

namespace App\Http\Controllers;

use App\Models\ImagenQr;
use App\Models\NotaVenta;
use App\Models\Ticket;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarMail;

class NotaVentaController extends Controller
{
    
    public function crear(Request $request)
    {
        // return $request;
        $tickets = json_decode($request['tickets'], true);
        if (isset($request['ubicacion_id']) && $request['ubicacion_id']) {
        }
        return view('compras.notaVentas.create', compact('tickets'));
    }

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $nota = NotaVenta::create($request->all());
        if (isset($request['tickets'])) {   //es solo ubicacion           
            $tickets = json_decode($request['tickets'], true);
            // return $request;
            $n = count($tickets);
            for ($i = 0; $i < $n; $i++) {
                $t = Ticket::create($tickets[$i]);
                $t->nota_venta_id = $nota['id'];
                $t->save();
                $this->GuardarQR($t);
                $ubicacion = Ubicacion::where('id', $tickets[$i]['ubicacion_id'])->first();
                if ($ubicacion) {
                    $c = $ubicacion['capacidad_disponible'];
                    $ubicacion['capacidad_disponible'] = $c - $tickets[$i]['cantidad'];
                    $ubicacion->save();
                }
            }
        }
        $ticket=Ticket::where($nota->id,'nota_venta_id')->get();
        $ticket->load('imagenes');
        Mail::to("erickvidal328@gmail")->send(new EnviarMail($nota,$ticket));
        return redirect()->route('eventosS');
    }

    public function GuardarQR($ticket)
    {
        // $cadenaDesencriptada = Crypt::decryptString('i2bHjCNHs0cOtKTj0VkNH8PLSIVa');
        $urlLocal = public_path() . '/qrcodes/q.png';
        $cadenaEncriptada = Crypt::encryptString($ticket->clave);
        QrCode::format('png')->size(100)->generate($cadenaEncriptada, $urlLocal);
        $file = $this->pathToUploadedFile($urlLocal);
        //crea el archiva en aws
        $pathPrivate = Storage::disk('s3')->put('qr', $file, 'public');
        $pathPublic =  Storage::disk('s3')->url($pathPrivate);
        $i = ImagenQr::create([
            'ticket_id' => $ticket->id,
            'path' => $pathPublic,
            'pathPrivate' => $pathPrivate,
        ]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function show(NotaVenta $notaVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaVenta $notaVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaVenta $notaVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaVenta $notaVenta)
    {
        //
    }
}
