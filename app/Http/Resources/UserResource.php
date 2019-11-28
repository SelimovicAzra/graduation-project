<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return[
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
             'password' => $this->password,
            'birth_date' => $this->birth_date,
            'city_id' => $this->city_id,
            'gender' =>$this->gender,
            'phone_number' =>$this->phone_number,
        ];
    }
}
