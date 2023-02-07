<?php

namespace App\Http\Controllers\Api;

use App\Models\TipoCostos;
use App\Http\Requests\TiposCostosRequest;
use App\Http\Resources\TiposCostosResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiposCostosController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = TipoCostos::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return TiposCostosResource::collection($cliente);

    }

    public function store(TiposCostosRequest $request)
    {
        $cliente = TipoCostos::create($request->validated());
        return new TiposCostosResource($cliente);

    }
    public function show($id)
    {
        $cliente = TipoCostos::where('id', $id)->get();
        return new TiposCostosResource($cliente[0]);
    }

    public function update($id, TiposCostosRequest $request)
    {
        $cliente = TipoCostos::where('id', $id)->update($request->validated());
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        TipoCostos::where('id', $id)->delete();
        return response()->noContent();
    }
}
