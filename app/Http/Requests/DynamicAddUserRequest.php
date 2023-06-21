<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DynamicAddUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string'
            ],
            'company_name' => [
                'required',
                'string'
            ],
            'last_name' => [
                'required',
                'string'
            ],
            'company_address' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string', 
                'email',
                'unique:users',
                'unique:temp_users'
            ],
            'zip_code' => [
                'required',
                'string'
            ],
            'contact_number' => [
                'required',
                'string'
            ],
            'user_role' => [
                'required'
            ],
            'token' => [
                
            ]
        ];
    }
}
