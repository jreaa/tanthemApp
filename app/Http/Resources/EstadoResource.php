<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstadoResource extends JsonResource
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
            'name' => ucwords($this->name),
            'color' => ($this->color),
            'colorFont' => ($this->colorFont),
            'description' => ucwords($this->description)
        ];
    }
}
