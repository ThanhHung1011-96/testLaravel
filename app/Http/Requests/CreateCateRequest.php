<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCateRequest extends FormRequest
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
            'c_name' => 'required|unique:categories,name|min:6|max:50'
        ];
    }
    public function messages()
    {
        return [
            'c_name.required' => 'Tên danh mục không được đẻ trống',
            'c_name.unique'   => 'Tên danh mục đã tồn tại',
            'c_name.min'      => 'Tên danh mục không ít hơn 6 kí tự',
            'c_name.max'      => 'Tên danh mục không nhiều hơn 50 kí tự'
        ];
    }
}