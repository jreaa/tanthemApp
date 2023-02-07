<?php

namespace App\Http\Resources\Plantillas;

use Illuminate\Http\Resources\Json\JsonResource;

class BodegaResource extends JsonResource
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
            'id_proyecto' => $this->id_proyecto,
            'name' => $this->name,
            'description' => $this->description,
            'fecha' => $this->fecha,
            'precio_costo' => $this->precio_costo
        ];
    }
}
