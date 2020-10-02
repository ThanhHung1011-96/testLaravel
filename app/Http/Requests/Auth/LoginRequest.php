<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|email|unique',
            'password' => 'required|min:6|max:20',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'A title is required',
    //         'name.max' => 'A title is required',

    //         'email.required' => 'A message is required',
    //         'email.email' => 'A message is required',
    //         'email.unique' => 'A message is required',

    //         'password.required' => 'A message is required',
    //         'password.min' => 'A message is required',
    //         'password.max' => 'A message is required'

    //     ];
    // }
}