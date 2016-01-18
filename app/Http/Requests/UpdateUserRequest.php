<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UpdateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->id == $this->request->get('id') && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('employee'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$user = User::find($this->request->get('id'));

        return [
            'name' => 'required|alpha|max:255',
            'surname' => 'required|alpha|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$this->request->get('id'),
        ];
    }
}
