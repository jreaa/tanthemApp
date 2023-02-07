<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProyectoRequest;
use App\Http\Resources\ProyectoResource;
use App\Models\Costeo;
use App\Models\Proyecto;
use App\Models\Tree;
use App\Models\UsersProyectoAsoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = request('id_user');
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        if($userId == 1) {
            $proyecto = Proyecto::select('proyectos.*','estados_costos.name as estadoname', 'estados_costos.color as estadocolor',
            'estados_costos.colorFont as estadocolorfont',
            'clientes.name as nameCliente', 'clientes.primary_phone as phoneCliente' 
            )
            ->join('cotizaciones', 'cotizaciones.id', '=', 'proyectos.proyecto')
            ->join('clientes', 'clientes.id', '=', 'cotizaciones.id_cliente')
            ->join('estados_costos', 'estados_costos.id', '=', 'proyectos.estado')
            ->search($search)
            ->orderBy($table, $sort)
            ->groupBy('proyectos.id')
            ->paginate($paginate);
        } else {
            $proyecto = 
            UsersProyectoAsoc::select('users_asoc.id_proyecto', 'users_asoc.id_user','proyectos.*'
            ,'estados_costos.name as estadoname', 
            'estados_costos.color as estadocolor',
            'estados_costos.colorFont as estadocolorfont',
            'clientes.name as nameCliente', 'clientes.primary_phone as phoneCliente' )
                ->where('id_user', $userId)
                ->join('proyectos', 'proyectos.id', '=', 'users_asoc.id_proyecto')
                ->join('cotizaciones', 'cotizaciones.id', '=', 'proyectos.proyecto')
                ->join('clientes', 'clientes.id', '=', 'cotizaciones.id_cliente')
                ->join('estados_costos', 'estados_costos.id', '=', 'proyectos.estado')
                ->search($search)
                ->orderBy($table, $sort)
                ->groupBy('proyectos.id')
                ->paginate($paginate);
        }


        return ProyectoResource::collection($proyecto);

    }

    public function getBodyAsoc($id)
    {
        $bodyAsoc = Tree::where('id_proyecto', $id)->get();

        $childrensAsoc = (json_decode($bodyAsoc[0]->body)[0]->folder->childrens);

        return $childrensAsoc;
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
    public function store(ProyectoRequest $request)
    {
        $proyecto = Proyecto::create($request->validated());

        if(!$request->usersSelectedAll) {
            if(sizeof($request->usersSelected) > 0){
                UsersProyectoAsoc::where('id_proyecto', $proyecto->id)->delete();
    
                foreach($request->usersSelected as $user) {
                    UsersProyectoAsoc::create([
                        'id_proyecto' => $proyecto->id,
                        'id_user'     => $user['code']
                    ]);
                }
    
            }
        }


        $tree = Tree::insert([
            'body' => "[{\"folder\":{\"nombre\":\"Sin asignar\",\"id\":\"1\",\"montoTotal\":\"0\",\"childrens\":[]}}]",
            "id_proyecto" => $proyecto->id
        ]);

        return new ProyectoResource($proyecto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $costeo = Costeo::where('id_proyecto', $id)->get();

        $proyecto = Proyecto::select('proyectos.*',
         'cotizaciones.n_interno as labelProyecto', 'cotizaciones.id as codeProyecto',
         'estados_costos.name as nameEstado', 'estados_costos.color as color', 'estados_costos.colorFont as colorFont' )
        ->where('proyectos.id', $id)
        ->join('estados_costos', 'estados_costos.id', '=', 'proyectos.estado')
        ->join('cotizaciones', 'cotizaciones.id', 'proyectos.proyecto')
        ->get();

        $users_asoc = UsersProyectoAsoc::select('users_asoc.*', 'users.name as nameUserAsoc')
                    ->where('id_proyecto', $proyecto[0]->id)
                    ->join('users', 'users.id', 'users_asoc.id_user')
                    ->get();

        $ingresos = 0;
        $pagos = 0;
        $costos = 0;

        foreach($costeo as $costo){
            if($costo->id_type == 1){
                $ingresos = $ingresos + $costo->value; 
            }elseif($costo->id_type == 2){
                $pagos = $pagos + $costo->value;
            }else{
                $costos = $costos + $costo->value;
            }
        }
        $data = [
            'data' => $proyecto[0],
            'users_asoc' => $users_asoc,
            'ingresos' => $ingresos,
            'pagos'    => $pagos,
            'costos'   => $costos
        ];

        //dd($data);

        //return new ProyectoResource($proyecto[0]);
        return ($data);
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
    public function update($id, ProyectoRequest $request)
    {
        $proyecto = Proyecto::where('id', $id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyecto::where('id', $id)->delete();
        return response()->noContent();
    }
}
