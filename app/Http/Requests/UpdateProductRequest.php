<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('employee');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_num|max:255',
            'serial_num' => 'string',
            'price' => 'required|numeric',
            'manufacturer' => 'required|string',
            'image_path' => 'url',
            'stock' => 'integer'
        ];
    }
}
