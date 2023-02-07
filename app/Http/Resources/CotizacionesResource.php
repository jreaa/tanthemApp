<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CotizacionesResource extends JsonResource
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
            'id_body' => $this->id_body,
            'id_contacto' => $this->id_contacto,
            'id_estado' => $this->id_estado,
            'description' => $this->description,
            'fecha'  => $this->fecha,
            'phoneClientes' => $this->phoneClientes,
            'nameCliente'   => ucwords($this->nameCliente),
            'n_interno' => $this->n_interno,
            'id_cliente' => $this->id_cliente,
            'monto' => $this->monto,
            'nameContacto'   => ucwords($this->nameContacto),
            'rutContacto' => $this->rutContacto,
            'colorname'   => $this->estadocolor,
            'estadoname'      => ucwords($this->estadoname),
            'colorfont' => $this->estadocolorfont,
            'responsable' => $this->responsable,
            'correo' => $this->correo,
            'telefonoContacto' => $this->telefonoContacto,
            'emailContacto' => $this->emailContacto,
            'unidad' => $this->unidad,
            'updated_at' => $this->updated_at
        ];
    }
}
