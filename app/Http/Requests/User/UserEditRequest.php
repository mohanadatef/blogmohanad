<?php

namespace app\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'required|max:255|string|unique:users,name,'.$this->id.',id',
            'email' => 'required|email|max:255|string|unique:users,email,'.$this->id.',id',
            'password' => 'required|string|min:6|confirmed',
        ];

    }

}
