<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\updateClienteRequest;
use App\Http\Resources\ClienteResource;
use App\Models\Clientes;
use App\Models\Contactos;
use App\Models\EstudioEstados;
use App\Models\EstudioUsuarios;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ClientesController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 50);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        if(request('estado')){
            $cliente = Clientes::select('clientes.*','estados.name as estadoname', 'estados.color as estadocolor','estados.colorFont as estadocolorfont', 'locations.name as regionName')
            ->join('estados', 'estados.id', '=', 'clientes.estado')
            ->join('locations', 'locations.id', '=', 'clientes.region_id')
            ->where('clientes.estado', request('estado'))
            ->search($search)->orderBy($table, $sort)->paginate($paginate);
        }else{
            $cliente = Clientes::select('clientes.*','estados.name as estadoname', 'estados.color as estadocolor','estados.colorFont as estadocolorfont', 'locations.name as regionName')
            ->join('estados', 'estados.id', '=', 'clientes.estado')
            ->join('locations', 'locations.id', '=', 'clientes.region_id')
            ->search($search)->orderBy($table, $sort)->paginate($paginate);
        }
        
        return ClienteResource::collection($cliente);
    }
    public function showAll(){
        $cliente = Clientes::select()->get();
        return ClienteResource::collection($cliente);
    }
    public function store(ClienteRequest $request)
    {
        $cliente = Clientes::create($request->validated());

        if(isset($request->contactos) && sizeof($request->contactos) > 0) {
            foreach ($request->contactos as $value) {
                Contactos::create([
                    'name' => $value['name'],
                    'rut' => $value['rut'],
                    'email' => $value['email'],
                    'telefono' => $value['telefono'],
                    'id_cliente' => $cliente->id
                ]);
            }
        }

        $estudioEstado = EstudioEstados::create([
            'id_estado'  => $request->estado,
            'id_cliente' => $cliente->id,
            'date'       =>  date('Y-m-d')
        ]);

        //return new ClienteResource($cliente);
        
    }
    public function show($id)
    {
        $cliente = DB::table('clientes')->select('clientes.*','estados.name as estadoname', 'estados.color as estadocolor','estados.colorFont as estadocolorfont', 'locations.name as regionName')
        ->join('estados', 'estados.id', '=', 'clientes.estado')
        ->join('locations', 'locations.id', '=', 'clientes.region_id')
        ->where('clientes.id', '=', $id)->first();

        return new ClienteResource($cliente);
    }
    public function update(Clientes $cliente, updateClienteRequest $request)
    {
        $cliente->update($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Modificacion de clientes"
        ]);

        return new ClienteResource($cliente);
    }
    public function destroy(Clientes $cliente)
    {
        $cliente->delete();
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Eliminacion de clientes"
        ]);
        return response()->noContent();
    }
}
