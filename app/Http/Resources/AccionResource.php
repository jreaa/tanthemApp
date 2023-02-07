<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccionResource extends JsonResource
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
            'color' => ucwords($this->color),
            'colorFont' => ucwords($this->colorFont),
            'description' => ucwords($this->description)
        ];
    }
}
