<?php

namespace App\Http\Controllers\Api\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function getAllPermissionsAttribute(Request $request) {
        $permisos = json_decode(json_encode(DB::table('role_has_permissions')->where("role_id", $request->id)->get()),True);
        $permissions = [];


        foreach($permisos as $permiso){
            $per = Permission::select("name")->where('id', $permiso['permission_id'])->get();
            
            array_push($permissions,$per[0]->name);
        }

        return $permissions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id', 'name')->get();

        return $roles;
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
        $rolesClientes = empty($request->rolesClientes[0]) ? '' : $request->rolesClientes;
        $rolesTipoClientes = empty($request->rolesTipoClientes[0]) ? '' : $request->rolesTipoClientes;
        $rolesEstados = empty($request->rolesEstados[0]) ? '' : $request->rolesEstados;
        $rolesProductos = empty($request->rolesProductos[0]) ? '' : $request->rolesProductos;
        $rolesServicios = empty($request->rolesServicios[0]) ? '' : $request->rolesServicios;
        $name = $request->name;

        $role = Role::create(['name' => $name]);

        if($rolesClientes != ''){
            for($i = 0; $i < sizeof($rolesClientes); $i++){
                $role->givePermissionTo(Permission::where('name',$rolesClientes[$i])->get());
            }
        }

        if($rolesTipoClientes != ''){
            for($i = 0; $i < sizeof($rolesTipoClientes); $i++){
                $role->givePermissionTo(Permission::where('name',$rolesTipoClientes[$i])->get() );
            }
        }

        if($rolesEstados != ''){
            for($i = 0; $i < sizeof($rolesEstados); $i++){
                $role->givePermissionTo(Permission::where('name',$rolesEstados[$i])->get());
            }
        }

        if($rolesProductos != ''){
            for($i = 0; $i < sizeof($rolesProductos); $i++){
                $role->givePermissionTo(Permission::where('name',$rolesProductos[$i])->get());
            }
        }
        if($rolesServicios != ''){
            for($i = 0; $i < sizeof($rolesServicios); $i++){
                $role->givePermissionTo(Permission::where('name',$rolesServicios[$i])->get());
            }
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
        $role = Role::where('id', $id)->get();
        $permisos = json_decode(json_encode(DB::table('role_has_permissions')->where("role_id", $id)->get()),True);
        $permissions = [];

        $rolesClientes = [];
        $rolesTipoClientes = [];
        $rolesEstados = [];
        $rolesProductos = [];
        $rolesServicios = [];

        foreach($permisos as $permiso){
            $per = Permission::select("name")->where('id', $permiso['permission_id'])->get();
            array_push($permissions,$per[0]->name);
        }

        for($i = 0; $i < sizeof($permissions); $i++){
            if($permissions[$i] == 'clientes.create' || $permissions[$i] == 'clientes.edit' ||
            $permissions[$i] == 'clientes.read' || $permissions[$i] == 'clientes.delete' ){
                array_push($rolesClientes, $permissions[$i]);
            }
            if($permissions[$i] == 'tipoclientes.create' || $permissions[$i] == 'tipoclientes.edit' ||
            $permissions[$i] == 'tipoclientes.read' || $permissions[$i] == 'tipoclientes.delete' ){
                array_push($rolesTipoClientes, $permissions[$i]);
            }
            if($permissions[$i] == 'estados.create' || $permissions[$i] == 'estados.edit' ||
            $permissions[$i] == 'estados.read' || $permissions[$i] == 'estados.delete' ){
                array_push($rolesEstados, $permissions[$i]);
            }
            if($permissions[$i] == 'servicios.create' || $permissions[$i] == 'servicios.edit' ||
            $permissions[$i] == 'servicios.read' || $permissions[$i] == 'servicios.delete' || $permissions[$i] == 'servicios.visualizarall' ){
                array_push($rolesServicios, $permissions[$i]);
            }
            if($permissions[$i] == 'productos.create' || $permissions[$i] == 'productos.edit' ||
            $permissions[$i] == 'productos.read' || $permissions[$i] == 'productos.delete' || $permissions[$i] == 'productos.visualizarall'  ){
                array_push($rolesProductos, $permissions[$i]);
            }
        }

        return [
            'roles' => $role,
            'rolesClientes' => $rolesClientes,
            'rolesEstados' => $rolesEstados,
            'rolesTipoClientes' => $rolesTipoClientes,
            'rolesProductos' => $rolesProductos,
            'rolesServicios' => $rolesServicios,
        ];
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
    public function update($id,Request $request)
    {
        

        $rolesClientes = empty($request->rolesClientes[0]) ? [] : $request->rolesClientes;
        $rolesTipoClientes = empty($request->rolesTipoClientes[0]) ? [] : $request->rolesTipoClientes;
        $rolesEstados = empty($request->rolesEstados[0]) ? [] : $request->rolesEstados;
        $rolesProductos = empty($request->rolesProductos[0]) ? '' : $request->rolesProductos;
        $rolesServicios = empty($request->rolesServicios[0]) ? '' : $request->rolesServicios;
        $name = $request->name;


        Role::where('id', $id)->update([
            'name' => $request->name
        ]);

        $permisos = json_decode(json_encode(DB::table('role_has_permissions')->where("role_id", $id)->get()),True);
        $permissions = [];

        foreach($permisos as $permiso){
            $per = Permission::select("name")->where('id', $permiso['permission_id'])->get();
            array_push($permissions,$per[0]->name);
        }

        for($i=0;$i<sizeof($permissions);$i++){
            if((in_array($permissions[$i], $rolesTipoClientes)) == false && (in_array($permissions[$i], $rolesClientes)) == false && (in_array($permissions[$i], $rolesEstados)) == false
            && (in_array($permissions[$i], $rolesProductos)) == false  && (in_array($permissions[$i], $rolesServicios)) == false){
                echo "no se utiliza :". $permissions[$i];
                $p = Permission::where('name', $permissions[$i])->get();
                DB::table('role_has_permissions')->where('permission_id',$p[0]->id)->where('role_id',$id)->delete();
            }
            
        }
        for($i = 0; $i < sizeof($rolesClientes);$i++){
                if((in_array($rolesClientes[$i], $permissions)) == false){
                    $p = Permission::where('name', $rolesClientes[$i])->get();
                    DB::table('role_has_permissions')->insert([
                        'role_id' => $id,
                        'permission_id' => $p[0]->id
                    ]);
                }
        }
        for($i = 0; $i < sizeof($rolesProductos);$i++){
            if((in_array($rolesProductos[$i], $permissions)) == false){
                $p = Permission::where('name', $rolesProductos[$i])->get();
                DB::table('role_has_permissions')->insert([
                    'role_id' => $id,
                    'permission_id' => $p[0]->id
                ]);
            }
        }
        for($i = 0; $i < sizeof($rolesServicios);$i++){
            if((in_array($rolesServicios[$i], $permissions)) == false){
                $p = Permission::where('name', $rolesServicios[$i])->get();
                DB::table('role_has_permissions')->insert([
                    'role_id' => $id,
                    'permission_id' => $p[0]->id
                ]);
            }
        }
        for($i = 0; $i < sizeof($rolesTipoClientes);$i++){
            if((in_array($rolesTipoClientes[$i], $permissions)) == false){

                echo "se utiliza :". $rolesTipoClientes[$i];
                $p = Permission::where('name', $rolesTipoClientes[$i])->get();
                DB::table('role_has_permissions')->insert([
                    'role_id' => $id,
                    'permission_id' => $p[0]->id
                ]);
            }
        }
    for($i = 0; $i < sizeof($rolesEstados);$i++){
        if((in_array($rolesEstados[$i], $permissions)) == false){
            $p = Permission::where('name', $rolesEstados[$i])->get();
            DB::table('role_has_permissions')->insert([
                'role_id' => $id,
                'permission_id' => $p[0]->id
            ]);
        }
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
        Role::where('id', $id)->delete();
        return response()->noContent();
    }
}
