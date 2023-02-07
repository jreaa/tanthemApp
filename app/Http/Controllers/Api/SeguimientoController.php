<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeguimientoRequest;
use App\Http\Resources\SeguimientoResource;

use App\Models\EstudioUsuarios;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    public function index() {
        $paginate = request('paginate', 50);
        $search = request('q', '');
        $sort = request('sort', 'desc');
        $table = request('table','updated_at');
        $pendiente = request('pendiente','');


        if(request('cliente') == 'undefined' && $pendiente == ''){
            $seguimiento = Seguimiento::select("seguimientos.*", "clientes.name as nameCliente", "clientes.primary_phone as phoneClientes", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")
            ->join('clientes', 'clientes.id', 'seguimientos.client_id')
            ->join('accion', 'accion.id', 'seguimientos.action')
            ->orderBy('seguimientos.updated_at', 'desc')
            ->search($search)->paginate($paginate);
        }else if(request('cliente') == 'undefined' && $pendiente != ''){
            $seguimiento = Seguimiento::select("seguimientos.*", "clientes.name as nameCliente", "clientes.primary_phone as phoneClientes", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")
            ->join('clientes', 'clientes.id', 'seguimientos.client_id')
            ->join('accion', 'accion.id', 'seguimientos.action')
            ->where('seguimientos.prox_agendamiento', $pendiente)
            ->orderBy('seguimientos.updated_at', 'desc')
            ->search($search)->paginate($paginate);
        }else if(request('cliente') != 'undefined' && $pendiente == ''){
            $seguimiento = Seguimiento::select("seguimientos.*", "clientes.name as nameCliente", "clientes.primary_phone as phoneClientes", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")
            ->join('clientes', 'clientes.id', 'seguimientos.client_id')
            ->join('accion', 'accion.id', 'seguimientos.action')
            ->where('seguimientos.client_id', request('cliente'))
            ->orderBy('seguimientos.updated_at', 'desc')
            ->search($search)->paginate($paginate);
        }else{
            $seguimiento = Seguimiento::select("seguimientos.*", "clientes.name as nameCliente", "clientes.primary_phone as phoneClientes", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")
            ->join('clientes', 'clientes.id', 'seguimientos.client_id')
            ->join('accion', 'accion.id', 'seguimientos.action')
            ->where('seguimientos.client_id', request('cliente'))
            ->where('seguimientos.prox_agendamiento', $pendiente)
            ->orderBy('seguimientos.updated_at', 'desc')->paginate($paginate);

        }
        return SeguimientoResource::collection($seguimiento);
    }

    public function getPendientesSeguimientos()
    {
        $events = [];
        $seguimiento = Seguimiento::select('seguimientos.*', 'clientes.name as nameCliente')
                        ->join('clientes', 'clientes.id','seguimientos.client_id')
                        ->where('prox_agendamiento', true)
                    ->get();

        $date = '';
        $title = '';
        $description = '';

        foreach($seguimiento as $seg){
            $e = [
                'title' => ' Cliente : '.$seg['nameCliente'].'- Responsable: '.$seg['contact'],
                'description' => $seg['action'],
                'date' => $seg['date'],
                'id_seguimiento' => $seg['id'],
                'className' => "fc-event-danger fc-event-solid-primary"
            ];

            array_push($events, $e);
        }
        return $events;
        
    }

    public function showSeguimiento ($id)
    {   
        $events = [];
        $seguimiento = Seguimiento::where('client_id', $id)->get();

        $date = '';
        $title = '';
        $description = '';

        foreach($seguimiento as $seg){
            $e = [
                'title' => $seg['contact'],
                'description' => $seg['contact'],
                'date' => $seg['date'],
                'className' => "fc-event-danger fc-event-solid-primary"
            ];

            array_push($events, $e);
        }
        return $events;
    }

    public function showAll($id)
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'DESC');
        $table = request('table','updated_at');
        
        if(request('date') != ''){
            $date = request('date');
            $seguimiento = Seguimiento::select("seguimientos.*", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")->where('client_id', $id)->where('date', $date)
            ->join('accion', 'accion.id', 'seguimientos.action')
            ->search($search)->orderBy($table, $sort)->paginate($paginate);
        }else{
            $seguimiento = Seguimiento::select("seguimientos.*", "accion.name as accionName", "accion.color as accionColor", "accion.colorFont as accionColorFont")->where('client_id', $id)
            ->join('accion', 'accion.id', 'seguimientos.action')
            ->search($search)->orderBy($table, $sort)->paginate($paginate);
        }
        
        return SeguimientoResource::collection($seguimiento);
    }

    public function store(SeguimientoRequest $request)
    {
        $seguimiento = Seguimiento::create([
            'comment' => $request->comment,
            'contact' => $request->contact,
            'date' => date("Y-m-d H:i:s", strtotime($request->date)),
            'action' => $request->action,
            'client_id' => $request->client_id,
            'prox_agendamiento' => $request->prox_agendamiento
        ]);
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Ingreso de seguimiento"
        ]);

        return new SeguimientoResource($seguimiento);

    }

    public function changeSeguimiento(Request $request){
        
        Seguimiento::where('id', $request->id)->update([
            'prox_agendamiento' => $request->prox_agendamiento
        ]);
    }

    public function show($id)
    {
        $seguimiento = Seguimiento::where('id', $id)->get();
        return new SeguimientoResource($seguimiento[0]);
    }

    public function update($id, SeguimientoRequest $request)
    {
        $cliente = Seguimiento::where('id', $id)->update($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Actualizacion de seguimiento"
        ]);
        //return new TipoClientesResource($cliente);
    }

    public function destroy($id)
    {
        Seguimiento::where('id', $id)->delete();
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Eliminacion de seguimiento"
        ]);
        return response()->noContent();
    }
}
