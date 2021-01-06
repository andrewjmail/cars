<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'id'=> $this->id,
            'make' => $this->model->make,
            'model' => $this->model,
            'price' => $this->price,
            'colour' => $this->colour,
            'fuelType' => $this->fuelType->type
        ];
    }
}
