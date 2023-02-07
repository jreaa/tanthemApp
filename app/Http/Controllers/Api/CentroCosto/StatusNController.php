<?php

namespace App\Http\Controllers\Api\CentroCosto;

use App\Http\Controllers\Controller;
use App\Models\StatusN;
use App\Http\Resources\StatusNResource;
use Illuminate\Http\Request;

class StatusNController extends Controller
{
    public function bringValues(Request $request){
        $table = $request->table;

        $values = StatusN::select()->where("table", $table)->get();

        return StatusNResource::collection($values);
    }
    public function updateValues(Request $request){

        StatusN::where("table", $request->table)->update([
            'n1' => $request->n1,
            'n2' => $request->n2,
            'n3' => $request->n3,
            'n4' => $request->n4,
            'n1Value' => $request->n1Value,
            'n2Value' => $request->n2Value,
            'n3Value' => $request->n3Value,
            'n4Value'=> $request->n4Value,
        ]);
    }
}
