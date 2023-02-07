<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductosResource extends JsonResource
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
            'cod' => $this->cod,
            'estado'      => $this->estado,
            'description' => $this->description,
            'comentarios' => $this->comentarios,
            'precio'  => $this->precio,
            'stock' => $this->stock,
            'uf' => $this->uf,
            'colorname'   => $this->estadocolor,
            'estadoname'      => ucwords($this->estadoname),
            'colorfont' => $this->estadocolorfont,
            'tipo' => $this->tipo
        ];
    }
}
