<?php

namespace App\Http\Controllers;

use App\Models\NotaVenta;
use Illuminate\Http\Request;

class NotaVentaController extends Controller
{
    
    public function crear(Request $request)
    {
        return $request;        
    }

    public function index()
    {
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
