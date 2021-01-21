<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuItemRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('errors.validation.required', ['field' => 'название']),
            'price.required' => __('errors.validation.required', ['field' => 'цена']),
            'price.numeric' => __('errors.validation.numeric', ['field' => 'цена']),
            'category.required' => __('errors.validation.numeric', ['field' => 'категория']),
            'category.numeric' => __('errors.validation.numeric', ['field' => 'категория']),
        ];
    }
}
