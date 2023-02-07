<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
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
            'id'        => $this->id,
            'name'      => ucwords($this->name),
            'comentarios' => $this->comentarios,
            'rubro_id' => $this->rubro_id,
            'estado'      => $this->estado,
            'rut'  => ucwords($this->rut),
            'primary_phone'       => $this->primary_phone,
            'email'     => strtolower($this->email),
            'secondary_phone'       => $this->secondary_phone,
            'category'       => $this->category,
            'website'       => $this->website,
            'address'       => ucwords($this->address),
            'contact_name'       => ucwords($this->contact_name),
            'type'       => $this->type,
            'region_id'       => $this->region_id,
            'comuna_id'        => $this->comuna_id,
            'colorname'   => $this->estadocolor,
            'estadoname'      => ucwords($this->estadoname),
            'colorfont' => $this->estadocolorfont,
            'regionName' => $this->regionName,
            'rut_cliente' => $this->rut_cliente,
            'pais'          => $this->pais,
            'email2' => $this->email2,
            'created_at' => $this->created_at
        ];
    }
}
