<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CosteoResource extends JsonResource
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
            'description' => ucwords($this->description),
            'date' => $this->date,
            'id_type' => $this->id_type,
            'type' => $this->type,
            'status' => $this->status,
            'value' => $this->value,
            'id_proyecto' => $this->id_proyecto,
            'id_leaf' => $this->id_leaf,
            'estadocolor'   => $this->estadocolor,
            'estadoname'      => ucwords($this->estadoname),
            'estadocolorfont' => $this->estadocolorfont,
            'tablacolor'   => $this->tablacolor,
            'tablaname'      => ucwords($this->tablaname),
            'tablacolorfont' => $this->tablacolorfont,
            'pendiente' => $this->pendiente,
            'id_proceso' => $this->id_proceso
        ];
    }
}
