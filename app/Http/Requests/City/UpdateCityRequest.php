<?php

namespace App\Http\Requests\City;

use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user()->can('update', $this->route('city'));

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
            'name' => 'sometimes',
            'slug' => 'sometimes',
            'zip_code' => 'sometimes',
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
            'country_id.required' => 'CountryCms id address code is required!',
            'zip_code.required' => 'Zip code address code is required!',
        ];
    }
}
