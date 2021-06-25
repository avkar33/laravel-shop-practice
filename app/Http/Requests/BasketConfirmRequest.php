<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketConfirmRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'email' => 'email:rfc,dns',
        ];
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
