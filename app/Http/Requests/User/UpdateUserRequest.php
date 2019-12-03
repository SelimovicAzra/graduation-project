<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();

        return $user;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'sometimes|email',
            'name' => 'sometimes|string|max:50',
            'password' => 'sometimes|string|min:8|confirmed',
            'birth_date' => 'sometimes',
            'gender' => 'sometimes',
            'city_id' => 'sometimes',
            'phone_number' => 'sometimes',
            'image' => 'sometimes|image',
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
             'email.required' => 'Email is required!',
             'first_name.required' => 'Name is required!',
            'last_name.required' => 'Name is required!',
            'password.required' => 'Password is required',
            'birth_date.required' => 'Birth date is required',
            'city_id.required' => 'City id is required',
            'phone_number.required' => 'Phone number is required',

        ];
    }
}
