<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeguimientosCotizacion;
use App\Http\Requests\SeguimientoCotizacionRequest;
use App\Http\Resources\SeguimientoCotizacionResource;

class SeguimientoCotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $paginate = request('paginate', 50);
        $search = request('q', '');
        $sort = request('sort', 'desc');
        $table = request('table','updated_at');
        $pendiente = request('pendiente','');


        if(request('cotizacion') == 'undefined' && $pendiente == ''){
            $seguimiento = SeguimientosCotizacion::select("seguimientos_cotizaciones.*", 
            "contactos.name as nameCliente", "contactos.rut as phoneClientes", 
            "accion.name as accionName", "accion.color as accionColor", 
            "accion.colorFont as accionColorFont")
            ->join('cotizaciones', 'cotizaciones.id', 'seguimientos_cotizaciones.cotizacion_id')
            ->join('contactos', 'contactos.id', 'cotizaciones.id_contacto')
            ->join('accion', 'accion.id', 'seguimientos_cotizaciones.action')
            ->orderBy('seguimientos_cotizaciones.updated_at', 'desc')
            ->search($search)->paginate($paginate);
        }else if(request('cotizacion') == 'undefined' && $pendiente != ''){
            $seguimiento = SeguimientosCotizacion::select("seguimientos_cotizaciones.*", 
            "contactos.name as nameCliente", "contactos.rut as phoneClientes", 
            "accion.name as accionName", "accion.color as accionColor", 
            "accion.colorFont as accionColorFont")
            ->join('cotizaciones', 'cotizaciones.id', 'seguimientos_cotizaciones.cotizacion_id')
            ->join('contactos', 'contactos.id', 'cotizaciones.id_contacto')
            ->join('accion', 'accion.id', 'seguimientos_cotizaciones.action')
            ->where('seguimientos_cotizaciones.prox_agendamiento', $pendiente)
            ->orderBy('seguimientos_cotizaciones.updated_at', 'desc')
            ->search($search)->paginate($paginate);
        }else if(request('cotizacion') != 'undefined' && $pendiente == ''){
            $seguimiento = SeguimientosCotizacion::select("seguimientos_cotizaciones.*", 
            "contactos.name as nameCliente", "contactos.rut as phoneClientes", 
            "accion.name as accionName", "accion.color as accionColor", 
            "accion.colorFont as accionColorFont")
            ->join('cotizaciones', 'cotizaciones.id', 'seguimientos_cotizaciones.cotizacion_id')
            ->join('contactos', 'contactos.id', 'cotizaciones.id_contacto')
            ->join('accion', 'accion.id', 'seguimientos_cotizaciones.action')
            ->where('seguimientos_cotizaciones.cotizacion_id', request('cotizacion'))
            ->orderBy('seguimientos_cotizaciones.updated_at', 'desc')
            ->search($search)->paginate($paginate);
        }else{
            $seguimiento = SeguimientosCotizacion::select("seguimientos_cotizaciones.*", 
            "contactos.name as nameCliente", "contactos.rut as phoneClientes", 
            "accion.name as accionName", "accion.color as accionColor", 
            "accion.colorFont as accionColorFont")
            ->join('cotizaciones', 'cotizacion.id', 'seguimientos_cotizaciones.cotizacion_id')
            ->join('contactos', 'contactos.id', 'cotizacion.id_contacto')
            ->join('accion', 'accion.id', 'seguimientos_cotizaciones.action')
            ->where('seguimientos_cotizaciones.cotizacion_id', request('cotizacion'))
            ->where('seguimientos_cotizaciones.prox_agendamiento', $pendiente)
            ->orderBy('seguimientos_cotizaciones.updated_at', 'desc')->paginate($paginate);

        }
        return SeguimientoCotizacionResource::collection($seguimiento);
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
        $seguimiento = SeguimientosCotizacion::create([
            'comment' => $request->comment,
            'contact' => $request->contact,
            'date' => date("Y-m-d H:i:s", strtotime($request->date)),
            'action' => $request->action,
            'cotizacion_id' => $request->cotizacion_id,
            'prox_agendamiento' => $request->prox_agendamiento
        ]);

        return new SeguimientoCotizacionResource($seguimiento);

    }

    public function changeSeguimiento(Request $request){
        
        SeguimientosCotizacion::where('id', $request->id)->update([
            'prox_agendamiento' => $request->prox_agendamiento
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seguimiento = SeguimientosCotizacion::where('id', $id)->get();
        return new SeguimientoCotizacionResource($seguimiento[0]);
    }

    public function showAll($id)
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'DESC');
        $table = request('table','updated_at');
        
        if(request('date') != ''){
            $date = request('date');
            $seguimiento = SeguimientosCotizacion::select("seguimientos_cotizaciones.*", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")->where('client_id', $id)
            ->where('date', $date)
            ->join('accion', 'accion.id', 'seguimientos_cotizaciones.action')
            ->search($search)->orderBy($table, $sort)->paginate($paginate);
        }else{
            $seguimiento = SeguimientosCotizacion::select("seguimientos_cotizaciones.*", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")
            ->where('cotizacion_id', $id)
            ->join('accion', 'accion.id', 'seguimientos_cotizaciones.action')
            ->search($search)->orderBy($table, $sort)->paginate($paginate);
        }
        
        return SeguimientoCotizacionResource::collection($seguimiento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, SeguimientoCotizacionRequest $request)
    {
        $cliente = SeguimientosCotizacion::where('id', $id)
        ->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SeguimientosCotizacion::where('id', $id)->delete();
        return response()->noContent();
    }
}
