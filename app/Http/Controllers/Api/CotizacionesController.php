<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CotizacionesRequest;
use App\Http\Resources\CotizacionesResource;
use App\Models\EstudioUsuarios;
use App\Models\Cotizaciones;
use App\Models\CotizacionBody;
use App\Models\ProductosAsoc;

use App\Http\Controllers\Controller;
use App\Models\EstudioEstados;
use App\Models\SeguimientosCotizacion;
use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','n_interno');

        $cliente = Cotizaciones::select("cotizaciones.*" ,"clientes.name as nameCliente", 
        "clientes.primary_phone as phoneClientes"
        ,'estados_proyectos.name as estadoname', 'estados_proyectos.color as estadocolor',
        'estados_proyectos.colorFont as estadocolorfont', 
        'contactos.name as nameContacto',
        'contactos.rut as rutContacto',
        'contactos.telefono as telefonoContacto',
        'contactos.email as emailContacto'
        ) 
        ->join('clientes', 'clientes.id', 'cotizaciones.id_cliente')
        ->join('contactos', 'contactos.id', 'cotizaciones.id_contacto')
        ->join('estados_proyectos', 'estados_proyectos.id', 'cotizaciones.id_estado')
        ->orderBy($table, $sort)
        ->search($search)
        ->paginate($paginate);
        
        return CotizacionesResource::collection($cliente);

    }


    public function getBody($id)
    {
        $cotizacion = CotizacionBody::where('id',$id)->get();
        return $cotizacion; 
    }

    public function storeBody(Request $request)
    {
        $array = [];
        array_push($array,$request->body);
        CotizacionBody::where('id', request('id'))->update([
            'bodyCotizaciones' => json_encode($array)
        ]);
    }

    public function store(CotizacionesRequest $request)
    {
        $cotizacionesBody = CotizacionBody::create([
            'bodyCotizaciones' => ''
        ]);

        $cotizacion = Cotizaciones::create([
            'id_body' => $cotizacionesBody->id,
            'description' => $request->description,
            'fecha' => $request->fecha,
            'n_interno' => $request->n_interno,
            'id_cliente' => $request->id_cliente,
            'id_estado' => $request->id_estado,
            'id_contacto' => $request->id_contacto,
            'monto' => (float) $request->monto,
            'responsable' => $request->responsable,
            'correo' => $request->correo,
        ]);

        $estudioEstado = EstudioEstados::create([
            'id_estado'  => $request->estado,
            'id_cliente' => $cotizacion->id,
            'date'       =>  date('Y-m-d')
        ]);

        return new CotizacionesResource($cotizacion);

    }

    public function indexProductosAsoc()
    {
        $productoAsoc = ProductosAsoc::select()
        ->join('productos', 'productos.id', '=', 'productos_asoc.id_producto')
        ->where('productos_asoc.id_cotizacion', request('id'))->get();

        return json_encode($productoAsoc);
    }
    public function indexProductosAsocUnique($id)
    {
        $productoAsoc = ProductosAsoc::select()
        ->join('productos', 'productos.id', '=', 'productos_asoc.id_producto')
        ->where('productos_asoc.id_cotizacion', request('id'))->where('productos.id',$id)->get();

        return json_encode($productoAsoc);
    }

    public function storeProductosAsoc(Request $request)
    {
        $productoAsoc = ProductosAsoc::create([
            'id_producto' => $request->id_producto,
            'id_cotizacion'=> $request->id_cotizacion,
            'cantidad' => 0,
            'total_precio' => 0
        ]);
    }

    public function saveProductoAsoc(Request $request)
    {
        $productoAsoc = ProductosAsoc::where('id_producto', $request->id)->update([
            'cantidad' => $request->total,
            'total_precio' => $request->precioTotal
        ]);
    }

    public function deleteProductoAsoc($id)
    {
        $productoAsoc = ProductosAsoc::where('id_producto', $id)->delete();
    }

    public function show($id)
    {
        $cliente = Cotizaciones::select("cotizaciones.*" ,"clientes.name as nameCliente", 
        "clientes.primary_phone as phoneClientes"
        ,'estados_proyectos.name as estadoname', 
        'estados_proyectos.color as estadocolor',
        'estados_proyectos.colorFont as estadocolorfont', 
        'contactos.name as nameContacto',
        'contactos.rut as rutContacto',
        'contactos.telefono as telefonoContacto',
        'contactos.email as emailContacto'
        ) 
        ->join('clientes', 'clientes.id', 'cotizaciones.id_cliente')
        ->join('contactos', 'contactos.id', 'cotizaciones.id_contacto')
        ->join('estados_proyectos', 'estados_proyectos.id', 'cotizaciones.id_estado')
        ->where('cotizaciones.id', $id)
        ->get();
        return new CotizacionesResource($cliente[0]);
    }

    public function update($id, CotizacionesRequest $request)
    {
        $cliente = Cotizaciones::findOrFail($id);
        $cliente->update($request->validated());

        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Actualizacion de tipo de clientes"
        ]);

        $date = date('Y-m-d');

        $estudioEstado = EstudioEstados::where('id_cliente', $cliente->id)->where('date', $date)->get();

        if(sizeof($estudioEstado) > 0) {
            EstudioEstados::where('id', $estudioEstado[0]->id)->delete();
        } 

        EstudioEstados::create([
            'id_estado'  => $request->id_estado,
            'id_cliente' => $cliente->id,
            'date'       => $date
        ]);
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        Cotizaciones::where('id', $id)->delete();
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Eliminacion de tipo de clientes"
        ]);
        return response()->noContent();
    }
}
