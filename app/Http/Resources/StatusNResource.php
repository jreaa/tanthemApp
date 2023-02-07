<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StatusNResource extends JsonResource
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
            'table' => $this->table,
            'n0' => true,
            'n1' => $this->n1,
            'n2' => $this->n2,
            'n3' => $this->n3,
            'n4' => $this->n4,
            'n1Value' => $this->n1Value,
            'n2Value' => $this->n2Value,
            'n3Value' => $this->n3Value,
            'n4Value' => $this->n4Value,
        ];
    }
}
