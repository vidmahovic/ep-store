<?php

namespace App\Http\Requests;

use App\User;

class UpdateCustomerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user();

        return $user->hasRole('employee') || ($user->hasRole('customer') && $user->userable_id == $this->request->get('id'));

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
            'surname' => 'required|alpha|max:255',
            'email' => 'unique:users,email,'.$this->request->get('id'),
            'street' => ['required'],
            'phone' => ['max:255', 'string', 'regex:/^(([0-9]{3})[ \-\/]?([0-9]{3})[ \-\/]?([0-9]{3}))|([0-9]{9})|([\+]?([0-9]{3})[ \-\/]?([0-9]{2})[ \-\/]?([0-9]{3})[ \-\/]?([0-9]{3}))/'],
            'city_id' => 'required|exists:municipalities,id',
        ];
    }
}
