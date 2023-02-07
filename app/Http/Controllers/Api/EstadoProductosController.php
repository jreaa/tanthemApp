<?php

namespace App\Http\Controllers\Api;

use App\Models\EstadoProductos;
use App\Models\EstudioUsuarios;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadoProductosRequest;
use App\Http\Resources\EstadoProductosResource;
use Illuminate\Http\Request;

class EstadoProductosController extends Controller
{
    
        public function index()
        {
            $paginate = request('paginate', 10);
            $search = request('q', '');
            $sort = request('sort', 'asc');
            $table = request('table','name');
    
            $cliente = EstadoProductos::select()
            ->search($search)
            ->orderBy($table, $sort)
            ->paginate($paginate);
            
            return EstadoProductosResource::collection($cliente);
    
        }
    
        public function store(EstadoProductosRequest $request)
        {
            $cliente = EstadoProductos::create($request->validated());
            $estudioUsuario = EstudioUsuarios::create([
                'id_user' => request('id_usuario'),
                'modificacion' => "Ingreso de estado"
            ]);
            return new EstadoProductosResource($cliente);
    
        }
        public function show($id)
        {
            $cliente = EstadoProductos::where('id', $id)->get();
            return new EstadoProductosResource($cliente[0]);
        }
    
        public function update($id, EstadoProductosRequest $request)
        {
            $cliente = EstadoProductos::where('id', $id)->update($request->validated());
            $estudioUsuario = EstudioUsuarios::create([
                'id_user' => request('id_usuario'),
                'modificacion' => "Modificacion de estado"
            ]);
            //return new TipoClientesResource($cliente);
        }
        
        public function destroy($id)
        {
            EstadoProductos::where('id', $id)->delete();
            $estudioUsuario = EstudioUsuarios::create([
                'id_user' => request('id_usuario'),
                'modificacion' => "Eliminacion de estados"
            ]);
            return response()->noContent();
        }
}
