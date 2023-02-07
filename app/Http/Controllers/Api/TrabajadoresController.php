<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Trabajadores;
use App\Http\Requests\TrabajadoresRequest;
use App\Http\Resources\TrabajadoresResources;

class TrabajadoresController extends Controller
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

        $trabajadores = Trabajadores::select('trabajadores.*')
        ->search($search)
        ->orderBy($table, $sort)
        ->paginate($paginate);

        return TrabajadoresResources::collection($trabajadores);
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
    public function store(TrabajadoresRequest $request)
    {
        $trabajadores = Trabajadores::create($request->validated());

        return new TrabajadoresResources($trabajadores);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $trabajadores = Trabajadores::select('trabajadores.*')
        ->where('trabajadores.id', $id)
        ->get();

        return json_encode($trabajadores);
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
    public function update($id, TrabajadoresRequest $request)
    {
        $trabajadores = Trabajadores::where('id', $id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trabajadores::where('id', $id)->delete();
        return response()->noContent();
    }
}
