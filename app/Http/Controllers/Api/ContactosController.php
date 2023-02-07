<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contactos;
use App\Http\Requests\ContactosRequest;
use App\Http\Resources\ContactosResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = request('paginate', 50);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $contactos = Contactos::select('contactos.*')
        ->search($search)
        ->orderBy($table, $sort)
        ->paginate($paginate);
        
        return ContactosResource::collection($contactos);
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
    public function store(ContactosRequest $request)
    {
        $contactos = Contactos::create($request->validated());

        return new ContactosResource($contactos);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_clientes_contactos($id)
    {
        $contactos = DB::table('contactos')
        ->select('contactos.*')
        ->where('contactos.id_cliente', '=', $id)
        ->get();

        return $contactos;
    }

    public function show($id)
    {
        $contactos = DB::table('contactos')
        ->select('contactos.*')
        ->where('contactos.id', '=', $id)
        ->get();

        return $contactos[0];
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
    public function update($id, ContactosRequest $request)
    {
        if(!$contacto = Contactos::findOrFail($id)) {
            return response()->json(['message' => 'Usuario not found'],200);
        }

        $contacto->update($request->validated());
        return new ContactosResource($contacto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$contacto = Contactos::findOrFail($id)) {
            return response()->json(['message' => 'Usuario not found'],200);
        }

        $contacto->delete();
        return response()->noContent();
    }
}
