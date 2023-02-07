<?php

namespace App\Http\Controllers\Api\CentroCosto;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicioRequest;
use App\Http\Resources\ServicioResource;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
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
        $table = request('table','servicios');
        $full = request("full");
        $id = request("user_id");

        if($full == "true"){
            $servicio = Servicio::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        }else{
            $servicio = Servicio::select()->where("id_usuario", $id)->search($search)->orderBy($table, $sort)->paginate($paginate);
    
        }


        
        return ServicioResource::collection($servicio);

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
    public function store(ServicioRequest $request)
    {
        $servicio = Servicio::create($request->validated());
        return new ServicioResource($servicio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::where('id', $id)->get();
        return new ServicioResource($servicio[0]);
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
    public function update($id, ServicioRequest $request)
    {
        $servicio = Servicio::where('id', $id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicio::where('id', $id)->delete();
        return response()->noContent();
    }
}
