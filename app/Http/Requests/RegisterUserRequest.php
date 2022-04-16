<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|max:255|min:3|regex:/^^[A-Za-z]+([\ A-Za-z]+)*$/u',
            'last_name' => 'required|max:255|min:3|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ];
    }
}
