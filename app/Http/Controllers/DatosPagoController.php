<?php

namespace App\Http\Controllers;

use App\Models\DatosPago;
use App\Models\TipoPago;
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
        $datoPagos=DatosPago::paginate(15);
        return view('datosPagos.index',compact('datoPagos'));
    }

    public function indexPago($id_tipoPago){
        abort_if(Gate::denies('ver-datosPago'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $datoPagos = DatosPago::all()->where('id_tipoPago', $id_tipoPago);
        return view('datosPagos.indexPago',compact('datoPagos', 'id_tipoPago'));
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
        $tipoPago=TipoPago::where('forma','Tigo Money');
        $this->validate($request,[
            'ci'=>'required',
            'nombre'=>'required',
            'nro'=>'required'
        ]);
        $datoPago=new DatosPago();
        $datoPago->id_tipoPago = $tipoPago->id;
        $datoPago->id_notaVenta = 1;
        $datoPago->ci = $request->ci;
        $datoPago->nombre = $request->nombre;
        $datoPago->nro = $request->nro;
        $datoPago->expiracion="--";
        $datoPago->cvc="--";
        $datoPago->estado="Procesado";
        $datoPago->save();
        return redirect()->route('tipoPagos.indexTipoPago');
    }
    public function storeDatoPago2(Request $request)
    {
        $tipoPago=TipoPago::where('forma','Tarjeta Debito o Credito');
        $this->validate($request,[
            'ci'=>'required',
            'nombre'=>'required',
            'nro'=>'required',
            'expiracion'=> 'required',
            'cvc'=> 'required',
        ]);
        $datoPago=new DatosPago();
        $datoPago->id_tipoPago = $tipoPago;
        $datoPago->id_notaVenta = 1;
        $datoPago->ci = $request->ci;
        $datoPago->nombre = $request->nombre;
        $datoPago->nro = $request->nro;
        $datoPago->expiracion = $request->expiracion;
        $datoPago->cvc = $request->cvc;
        $datoPago->estado="Procesado";
        $datoPago->save();
        return redirect()->route('tipoPagos.indexTipoPago');
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
