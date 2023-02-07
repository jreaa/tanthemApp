<?php

namespace App\Http\Resources\Plantillas;

use Illuminate\Http\Resources\Json\JsonResource;

class LogisticaResource extends JsonResource
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
            'description' => $this->description,
            'fecha' => $this->fecha,
            'precio_costo' => $this->precio_costo
        ];
    }
}
