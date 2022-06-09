<?php

namespace App\Http\Controllers;

use App\Models\NotaVenta;
use App\Models\Ticket;
use Illuminate\Http\Request;

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
        $nota = NotaVenta::create($request->all());
        if (isset($request['tickets'])) {             
            $tickets = json_decode($request['tickets'], true);    
            $n = count($tickets);
            for($i=0; $i < $n ; $i++) { 
                $t = Ticket::create($tickets[$i]);
                $t->nota_venta_id = $nota['id'];
                $t->save();
            }
        } 
        return redirect()->route('eventosS');
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
