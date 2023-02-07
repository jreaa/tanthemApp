<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeguimientoResource extends JsonResource
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
            'contact' => ucwords($this->contact),
            'action' => ($this->action),
            'comment' => ($this->comment),
            'date' =>$this->date,
            'client_id' => $this->client_id,
            'phoneClientes' => $this->phoneClientes,
            'nameCliente'   => ucwords($this->nameCliente),
            "accionColorFont"  => $this->accionColorFont,
            "accionColor" => $this->accionColor,
            "accionName" => $this->accionName,
            "prox_agendamiento" => $this->prox_agendamiento
        ];
    }
}
