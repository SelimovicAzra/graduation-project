<?php

namespace App\Http\Requests\City;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $city = Auth::user();
        return $city;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'sometimes',
            'zip_code' => 'required',
            'country_id' => 'sometimes'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'slug.required' => 'Slug is required!',
            'country_id.required' => 'Country id is required!',
            'zip_code.required' => 'Zip code is required!',
        ];
    }
}
