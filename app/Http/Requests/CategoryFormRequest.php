<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'description' => [
                'required'
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'csvfile' => [
                'required',
                'mimes:csv,txt'
            ],
            'xmlfile' => [
                'required',
                'mimes:xml,txt'
            ],
            'xlsfile' => [
                'required',
                'mimes:xls'
            ],
            'jsonfile' => [
                'required',
                'mimes:json'
            ],
            'meta_title' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required'
            ]
        ];
    }
}
