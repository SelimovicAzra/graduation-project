<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'name' => $this->name,
            'calling_code' => $this->calling_code,
            'capital' => $this->capital,
            'code' => $this->code,
            'code_alpha3' => $this->code_alpha3,
            'currency_code' => $this->currency_code,
            'currency_name' => $this->currency_name,
            'emoji' => $this->emoji,
            'full_name' => $this->full_name,
            'top_level_domain' => $this->top_level_domain,
            'cities' => CityResource::collection($this->whenLoaded('cities')),
            'medicines' => MedicineResource::collection($this->whenLoaded('medicines')),
            'created_at' =>$this->created_at
        ];
    }
}
