<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\categoriaEvento;
use App\Models\Contacto;
use App\Models\Espacio;
use App\Models\Sector;
use App\Models\Ticket;
use App\Models\Ubicacion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento=Evento::paginate(5);
        return view('eventos.index',compact('evento'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=categoriaEvento::all();
        $contactos=Contacto::all();
        $ubicacions = Ubicacion::all();
        return view('eventos.create',compact('categorias','contactos', 'ubicacions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $json = json_encode($request->all());
        // return $json;
        $this->validate($request,[
            'titulo'=>'required',
            'descripcion'=>'required',
            ]);

        $evento=new Evento($request->all());
        $evento->estado="desactivado";
        
        $evento->save();
        return redirect()->route('eventos.edit', $evento->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $evento->load('categoria_eventos','contactos');
        return view('eventos.show',compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        $ubicacions = $evento->ubicaciones;
        $files = $evento->imagenes;
        //dd($files);
        $categorias=categoriaEvento::all();
        $contactos=Contacto::all();

        return view('eventos.edit',compact('categorias','contactos','evento', 'ubicacions', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $this->validate($request,[
            'titulo'=>'required',
            'descripcion'=>'required',
            ]);

        $evento->titulo=$request->get('titulo');
        $evento->descripcion=$request->get('descripcion');
        $evento->id_categoria=$request->get('id_categoria');
        $evento->id_contacto=$request->get('id_contacto');
        $evento->estado=$request->get('estado');
        $evento->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return back();
    }

    public function showcliente(){
        $eventos=Evento::where('estado','inicio')->get();
        $eventos->load('imagenes');
        // return $eventos;
        // return $eventos;//[0]['imagenes'][0];
        // $buscador=Evento::where('estado','inicio')->pluck('id','titulo');
        // Session::put('eventos', json_encode($buscador));
        return view("eventos.showcliente",compact('eventos'));
    }


    public function generarReporte($evento_id)
    {
        $evento = Evento::find($evento_id);
        $ubicaciones = $evento->ubicaciones;    
        $ubicaciones_id = $ubicaciones->pluck('id');
        $Tickets = Ticket::whereIn('ubicacion_id', $ubicaciones_id)->get();
        
        $lista = new Collection();
        foreach ($Tickets as $ticket) $lista->prepend($ticket);

        $sectores = Sector::whereIn('id_ubicacion', $ubicaciones_id)->get();
        $sectores_id = $sectores->pluck('id');
        $Tickets = Ticket::whereIn('sector_id', $sectores_id)->get();
        foreach ($Tickets as $ticket) $lista->prepend($ticket);
        
        $espacios = Espacio::whereIn('id_sector', $sectores_id)->get();
        $espacios_id = $espacios->pluck('id');
        $Tickets = Ticket::whereIn('espacio_id', $espacios_id)->get(); 
        foreach ($Tickets as $ticket) $lista->prepend($ticket);
        // return $lista;
        $pdf = Pdf::loadView('eventos.pdf',compact('lista', 'evento'));
        return $pdf->stream('eventos.pdf');
        // return $pdf->download('eventos.pdf');
    }
}
