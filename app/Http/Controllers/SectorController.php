<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('ver-sector'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        $sectors= Sector::paginate(5);
        return view('sectors.index',compact('sectors'));
    }

    public function indexUbicacion($id_ubicacion){

        abort_if(Gate::denies('ver-sector'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        // $sectors=Sector::paginate(10);
        $sectors=Sector::all()->where('id_ubicacion', $id_ubicacion);
        // return $sectors;
        return view('sectors.indexUbicacion',compact('sectors', 'id_ubicacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('crear-sector'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        return view('sectors.create');
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
            'nombre'=>'required',
            'capacidad'=>'required',
            'referencia'=>'required'
        ]);
        Sector::create($request->all());
        return redirect()->route('sectors.index');
    }

    public function storeUbicacionSector(Request $request, $id_ubicacion)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'capacidad'=>'required',
            'referencia'=>'required'
        ]);
        $sectores=DB::table('sectors')->where('id_ubicacion',$id_ubicacion)->get();
        $ubicacion=Ubicacion::find($id_ubicacion);
        $suma=0;
        foreach($sectores as $sector){
            $suma=$suma+$sector->capacidad;
        }
        $suma=$suma+$request->get('capacidad');
        if ($ubicacion->capacidad>=$suma) {
            $sector=new Sector($request->all());
            $sector->capacidad_disponible=$request->capacidad;
            $sector->precio=0;
            $sector->save();
        }else{
            return back()->with('danger','Capacidad excedidad...');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        abort_if(Gate::denies('editar-sector'), Response::HTTP_FORBIDDEN, 'Error de Acesso');
        return view('sectors.edit',compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        request()->validate([
            'nombre'=>'required',
            'capacidad'=>'required',
            'referencia'=>'required'
        ]);
        $sector->update($request->all());
        return redirect()->route('sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector=Sector::find($id)->delete();
        return back();
        // return redirect()->route('sectors.index');
    }
}
