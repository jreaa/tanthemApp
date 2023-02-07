<?php

namespace App\Http\Controllers\Api;

use App\Models\Pagos;
use App\Http\Requests\PagosRequest;
use App\Http\Resources\PagosResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagosController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = Pagos::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return PagosResource::collection($cliente);

    }

    public function store(PagosRequest $request)
    {
        $cliente = Pagos::create($request->validated());
        return new PagosResource($cliente);

    }
    public function show($id)
    {
        $cliente = Pagos::where('id', $id)->get();
        return new PagosResource($cliente[0]);
    }

    public function update($id, PagosRequest $request)
    {
        $cliente = Pagos::where('id', $id)->update($request->validated());
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        Pagos::where('id', $id)->delete();
    }
}
