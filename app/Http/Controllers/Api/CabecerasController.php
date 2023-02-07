<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cabeceras;
use App\Http\Requests\CabecerasRequest;
use App\Http\Resources\CabecerasResource;

class CabecerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabeceras = Cabeceras::select('cabeceras.*')->get();
        return CabecerasResource::collection($cabeceras);
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
    public function store(Request $request)
    {
        if(!$cabeceras = Cabeceras::findOrFail($request->id)){
            return response()->json(['message' => 'La cabecera no fue encontrada', 'status' => 'error']);
        }
        try {
            if($request->hasFile('img')){
                $file = $request->file('img');
                $filename = time(). '.' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $cabeceras->update([
                    'titulo' => $request->titulo,
                    'subtitulo' => $request->subtitulo,
                    'description' => $request->description,
                    'img' => $filename
                ]);
                
            }else {
                $cabeceras->update([
                    'titulo' => $request->titulo,
                    'subtitulo' => $request->subtitulo,
                    'description' => $request->description,
                ]);
                
            }

            return response()->json([
                'message' => 'file upload'
            ], 200);
        } catch (PDOException $e) {
            return response()->json(['message' => $e, 'status' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabeceras = Cabeceras::select('cabeceras.*')
                    ->where('cabeceras.id', $id)
                    ->get();
        return CabecerasResource::collection($cabeceras);
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

    public function updateCabecera(Request $request)
    {
        dd($request);
    }


    public function update($id, CabecerasRequest $request )
    {
        /*


        //$comment = Comment::create($request->validated());

        //return new CommentResource($comment);*/
        dd($request);
        try {
            if($request->hasFile('img')){
                $file = $request->file('img');
                $filename = time(). '.' . $file->getClientOriginalName();
                $file->move(public_path('image'), $filename);

                return response()->json([
                    'message' => 'file upload'
                ], 200);
            }else {
                return "is not";
            }
            

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$cabeceras = Cabeceras::findOrFail($id)){
            return response()->json(['message' => 'La cabecera no fue encontrada', 'stauts' => 'error']);
        }
        try {
            $cabeceras->delete();
            return response()->json(['message' => 'Se elimino correctamente', 'status' => 'ok']);
        } catch (PDOException $e) {
            return response()->json(['message' => $e, 'status' => 'error']);
        }
    }
}
