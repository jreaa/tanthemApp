<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstudioUsuariosResource extends JsonResource
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
            "id_user" => $this->id_user,
            "modificacion"  => $this->modificacion,
            "created_at"  => $this->created_at,
            "updated_at"  => $this->updated_at
        ];
    }
}
