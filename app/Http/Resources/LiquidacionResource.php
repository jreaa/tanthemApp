<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LiquidacionResource extends JsonResource
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
            'id' => $this->id,
            'description' => $this->description,
            'fecha' => $this->fecha,
            'id_body' => $this->id_body,
            'id_trabajador' => $this->id_trabajador,            
            'phoneClientes' => $this->phoneClientes,
            'nameCliente'   => ucwords($this->nameCliente),
        ];
    }
}
