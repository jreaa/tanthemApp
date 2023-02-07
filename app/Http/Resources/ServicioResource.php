<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'id_usuario' => $this->id_usuario,
            "servicios" => $this->servicios,
            "carac"=>  $this->carac,
            "costo"=>  $this->costo,
            "pv" =>  $this->pv,
            "tipo" => $this->tipo,
            "n1" =>  $this->n1,
            "n2" =>  $this->n2,
            "n3" =>  $this->n3,
            "n4" =>  $this->n4,
        ];
    }
}
