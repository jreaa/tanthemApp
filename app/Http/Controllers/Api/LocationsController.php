<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function getRegiones()
    {
        return Location::where('parent_id' , null)->get();
    }
    public function getRegion($id)
    {
        return Location::where('id', $id)->get();
    }

    public function getComunas($location)
    {
        return Location::where('parent_id' , $location)->get();
    }

    public function getComunasByName($location)
    {
        return Location::where('name' , $location)->get();
    }

}
