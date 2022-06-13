<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use Illuminate\Http\Request;

class TipoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoPagos= TipoPago::paginate(10);
        return view('tipoPagos.index', compact('tipoPagos'));
    }

    public function indexTipoPago()
    {
        $tipoPagos= TipoPago::paginate(10);
        return view('tipoPagos.indexTipoPago', compact('tipoPagos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoPagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'forma'=>'required'
        ]);
        TipoPago::create($request->all());
        return redirect()->route('tipoPagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPago $tipoPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPago $tipoPago)
    {
        return view('tipoPagos.edit',compact('tipoPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPago $tipoPago)
    {
        request()->validate([
            'forma'=>'required'
        ]);
        $tipoPago->update($request->all());
        return redirect()->route('tipoPagos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoPago=TipoPago::find($id)->delete();
        return back();
    }
}
