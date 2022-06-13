<?php

namespace App\Http\Controllers;

use App\Models\DatosPago;
use App\Models\TipoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datoPagos=DatosPago::paginate(15);
        return view('datosPagos.index',compact('datoPagos'));
    }

    public function indexPago($id_tipoPago){
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
        //
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
    public function storeDatoPago(Request $request, $id_tipoPago)
    {
        $this->validate($request,[
            'ci'=>'required',
            'nombre'=>'required',
            'nro'=>'required'
        ]);
        $datoPago=new DatosPago();
        $datoPago->id_tipoPago = $id_tipoPago;
        $datoPago->ci = $request->ci;
        $datoPago->nombre = $request->nombre;
        $datoPago->nro = $request->nro;
        $datoPago->estado="Cobrado";
        $datoPago->save();
        return back();
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
