<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        // $hasRole = $user->hasRole('super_admin');
        return $user;
        // && $this->user()->can('add_user', $user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'email' => 'sometimes|email|unique:users',
            'name' => 'required|string|max:50',
            'password' => 'required',
            'birth_date' => 'sometimes',
            'gender' => 'sometimes',
            'city_id' => 'required',
            'phone_number' => 'sometimes|unique:users',
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
            'first_name.required' => 'First name is required!',
            'last_name.required' => 'Last name is required!',
            'password.required' => 'Password is required!',
            'birth_date.required' => 'Birth date is required',
            'city_id.required' => 'CityCms id is required',
            'phone_number.required' => 'Phone number isrequired',
        ];
    }
}
