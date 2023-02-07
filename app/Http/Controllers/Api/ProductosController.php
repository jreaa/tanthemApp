<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductosRequest;
use App\Http\Resources\ProductosResource;
use App\Models\EstudioUsuarios;
use App\Models\Productos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','cod');

        $cliente = Productos::select('productos.*','estados_productos.name as estadoname', 'estados_productos.color as estadocolor','estados_productos.colorFont as estadocolorfont')
        ->join('estados_productos', 'estados_productos.id', '=', 'productos.estado')
        ->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return ProductosResource::collection($cliente);

    }

    public function store(ProductosRequest $request)
    {
        $cliente = Productos::create($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Ingreso de tipo de clientes"
        ]);
        return new ProductosResource($cliente);
    }
    public function show($id)
    {
        $cliente = Productos::where('id', $id)->get();
        return new ProductosResource($cliente[0]);
    }

    public function update($id, ProductosRequest $request)
    {
        $cliente = Productos::where('id', $id)->update($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Actualizacion de tipo de clientes"
        ]);
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        Productos::where('id', $id)->delete();
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Eliminacion de tipo de clientes"
        ]);
        return response()->noContent();
    }

}
