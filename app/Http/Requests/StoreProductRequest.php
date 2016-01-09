<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('employee');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha|max:255',
            'serial_num' => 'alpha_num|unique:products,serial_num',
            'manufacturer' => 'required|alpha_num|max:255',
            'image_path' => '',
            'stock' => 'integer'
        ];
    }
}
