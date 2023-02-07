<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $usuarios = User::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return UserResource::collection($usuarios);
    }
    public function store(UserRequest $request)
    {
        $cliente = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return new UserResource($cliente);

    }
    public function show($id)
    {
        $cliente = User::where('id', $id)->get();
        return new UserResource($cliente[0]);
    }

    public function update($id, UserRequest $request)
    {
        $cliente = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        //return new TipoClientesResource($cliente);
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return response()->noContent();
    }

    public function getAll()
    {
        return User::select()->get();
    }
}
