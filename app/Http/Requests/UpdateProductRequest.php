<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $id = $this->p_id;
        return [
            'p_name'        => "required|unique:categories,name,$id|min:6|max:50",
            'p_quantity'    => 'required|integer',
            'category_id'   => 'required'
        ];
    }
    public function messages()
    {
        return [
            'p_name.required' => 'Tên sản phẩm không được đẻ trống',
            'p_name.unique'   => 'Tên sản phẩm đã tồn tại',
            'p_name.min'      => 'Tên sản phẩm không ít hơn 6 kí tự',
            'p_name.max'      => 'Tên sản phẩm không nhiều hơn 50 kí tự',

            'p_quantity.required' => 'Số lượng sản phẩm không được để trống',
            'p_quantity.integer'      => 'Số lượng sản phẩm phải là 1 số nguyên',

            'category_id.required' => 'Danh muc không được đẻ trống',

        ];
    }
}