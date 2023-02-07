<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CentrosCostosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_proceso' => $this->id_proceso,
            'name' => ucwords($this->name),
            'color' => ($this->color),
            'colorFont' => ($this->colorFont),
            'description' => ucwords($this->description)
        ];
    }
}
