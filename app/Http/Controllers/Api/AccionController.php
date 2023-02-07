<?php

namespace App\Http\Controllers\Api;
use App\Models\Accion;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccionRequest;
use App\Http\Resources\AccionResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = Accion::select()
        ->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return AccionResource::collection($cliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccionRequest $request)
    {
        $cliente = Accion::create($request->validated());
        return new AccionResource($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Accion::where('id', $id)->get();
        return new AccionResource($cliente[0]);
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
    public function update($id, AccionRequest $request)
    {
        $cliente = Accion::where('id', $id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Accion::where('id', $id)->delete();

        DB::table("seguimiento")->where("action", "=", $id)->update([
            "action" => 1
        ]);
        return response()->noContent();
    }
}
