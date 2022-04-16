<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|max:255|min:3|regex:/^[\pL\s\-]+$/u',
            'user_id' => 'required|exists:users,id',
            'phone' => 'required|regex:/^(\+)?([ 0-9]){5,16}$/u',
            'city' => 'required|string|min:3|max:255',
            'address' => 'required|min:5|max:255'
        ];
    }
}
