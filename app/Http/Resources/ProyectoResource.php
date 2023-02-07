<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProyectoResource extends JsonResource
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
            'description' => ucwords($this->description),
            'estado' => ucwords($this->estado),
            'costo_iva' => $this->costo_iva,
            'costo' => $this->costo,
            'ganancias' => $this->ganancias,
            'fecha_inicio' => $this->fecha_inicio,
            'colorname'   => $this->estadocolor,
            'estadoname'      => ucwords($this->estadoname),
            'colorfont' => $this->estadocolorfont,
            'nameCliente' => ucwords($this->nameCliente),
            'phoneCliente' => ucwords($this->phoneCliente),
            'correo' => ucwords($this->correo),
            'telefono' => $this->telefono,
            'direccion' => ucwords($this->direccion)
        ];
    }
}
