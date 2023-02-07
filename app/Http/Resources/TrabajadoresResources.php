<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrabajadoresResources extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone'=> $this->phone,
            'rut' => $this->rut,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'direccion' => $this->direccion
        ];
    }
}
