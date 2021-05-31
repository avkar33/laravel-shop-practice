<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'code' => 'required|min:3|max:20|unique:products,code',
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:100',
            'price' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:0'

        ];
        if ($this->route()->named('products.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'max' => 'Поле :attribute может иметь максимум :max символов',
        ];
    }
}
