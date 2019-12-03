<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'slug' => $this->slug,
            'zip_code' => $this->zip_code,
            'country_id' => $this->country_id,
            'users' => UserResource::collection($this->whenLoaded('users')),
            'country' => new CountryResource($this->whenLoaded('country')),
            'created_at' =>$this->created_at
        ];
    }
}
