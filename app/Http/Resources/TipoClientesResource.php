<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TipoClientesResource extends JsonResource
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
            'description' => ucwords($this->description)
        ];
    }
}
