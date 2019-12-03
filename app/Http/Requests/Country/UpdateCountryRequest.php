<?php

namespace App\Http\Requests\Country;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $country = Auth::user();
        return $country;
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
            'calling_code' => 'sometimes',
            'capital' => 'sometimes',
            'code' => 'sometimes',
            'code_alpha3' => 'sometimes',
            'currency_code' => 'sometimes',
            'currency_name' => 'sometimes',
            'emoji' => 'sometimes',
            'full_name' => 'sometimes',
            'top_level_domain' => 'sometimes',
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
            'calling_code.required' => 'Calling code is required',
            'capital.required' => 'Capital is required',
            'code.required' => 'Code is required',
            'code_alpha3.required' => 'Code alpha3 is required',
            'currency_code.required' => 'Currency code is required',
            'currency_name.required' => 'Currency name is required',
            'emoji.required' => 'Emoji is required',
            'full_name.required' => 'Full name is required',
            'tld.required' => 'Tld is required',
        ];
    }
}
