<?php

namespace App\Http\Controllers;

use App\Models\DatosPago;
use App\Models\Espacio;
use App\Models\NotaVenta;
use App\Models\Sector;
use App\Models\Ticket;
use App\Models\TipoPago;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DatosPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('ver-datosPago'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $datoPagos = DatosPago::paginate(15);
        return view('datosPagos.index', compact('datoPagos'));
    }

    public function indexPago($id_tipoPago)
    {
        abort_if(Gate::denies('ver-datosPago'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $datoPagos = DatosPago::all()->where('id_tipoPago', $id_tipoPago);
        return view('datosPagos.indexPago', compact('datoPagos', 'id_tipoPago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('crear-datosPago'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        return view('datosPagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function storeDatoPago(Request $request)
    {
        // return $request;
        // return json_decode($request['tickets'], true);
        $this->validate($request, [
            'ci' => 'required',
            'nombre' => 'required',
            'nro' => 'required'
        ]);

        $nota = NotaVenta::create([
            'nombre' => $request->nombre,
            'nit' => $request->ci,
            // 'correo' => '',
            // 'total' => ''
        ]);

        $total = 0;
        if (isset($request['tickets'])) {
            $tickets = json_decode($request['tickets'], true);
            // return $tickets;
            $n = count($tickets);
            for ($i = 0; $i < $n; $i++) {
                $total += $tickets[$i]['cantidad'] * $tickets[$i]['precio'];
                // return $tickets[$j]
                for ($j = 0; $j < $tickets[$i]['cantidad']; $j++) {
                    $t = Ticket::create($tickets[$i]);
                    $t->nota_venta_id = $nota['id'];
                    $t->save();
                }
                // $this->GuardarQR($t);
                if (isset($tickets[$i]['espacio_id'])) { //hay espacios                    
                    $espacio = Espacio::where('id', $tickets[$i]['espacio_id'])->first();
                    if ($espacio) {
                        $espacio->estado = Espacio::OCUPADO;
                        $espacio->save();
                    }
                } else {                    
                    $obj = (isset($tickets[$i]['sector_id'])) ?
                        Sector::where('id', $tickets[$i]['sector_id'])->first() :
                        Ubicacion::where('id', $tickets[$i]['ubicacion_id'])->first();
                    if ($obj) {
                        $obj->capacidad_disponible = $obj->capacidad_disponible - $tickets[$i]['cantidad'];
                        $obj->save();
                    }
                }
            }
        }
        $nota->total = $total;
        $nota->correo = 'falta guardar';
        $nota->save();

        // $tipoPago=TipoPago::where('forma','Tigo Money')->firts();
        // return $tipoPago;
        $datoPago = new DatosPago();
        $datoPago->id_tipoPago = 1;//$tipoPago->id;
        $datoPago->id_notaVenta = $nota->id;
        $datoPago->ci = $request->ci;
        $datoPago->nombre = $request->nombre;
        $datoPago->nro = $request->nro;
        // $datoPago->expiracion="--";
        // $datoPago->cvc="--";
        $datoPago->estado="Procesado";
        $datoPago->save();
        return 'se creo bien';
        return view('compras.notaVentas.create', compact('tickets'));
    }
    public function storeDatoPago2(Request $request)
    {
        // return $request;
        $tipoPago = TipoPago::where('forma', 'Tarjeta Debito o Credito');
        $this->validate($request, [
            'ci' => 'required',
            'nombre' => 'required',
            'nro' => 'required',
            'expiracion' => 'required',
            'cvc' => 'required',
        ]);
        $datoPago = new DatosPago();
        $datoPago->id_tipoPago = $tipoPago;
        $datoPago->id_notaVenta = 1;
        $datoPago->ci = $request->ci;
        $datoPago->nombre = $request->nombre;
        $datoPago->nro = $request->nro;
        $datoPago->expiracion = $request->expiracion;
        $datoPago->cvc = $request->cvc;
        $datoPago->estado = "Procesado";
        $datoPago->save();

        $tickets = json_decode($request['tickets'], true);
        // if (isset($request['ubicacion_id']) && $request['ubicacion_id']) {
        // }
        return view('compras.notaVentas.create', compact('tickets'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatosPago  $datosPago
     * @return \Illuminate\Http\Response
     */
    public function show(DatosPago $datosPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosPago  $datosPago
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosPago $datosPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DatosPago  $datosPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosPago $datosPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosPago  $datosPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosPago $datosPago)
    {
        //
    }
}
