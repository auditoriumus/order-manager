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
            'category' => 'required|numeric',
            'stock.*' => 'required',
            'stock-count.*' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('errors.validation.required', ['field' => 'название']),
            'price.required' => __('errors.validation.required', ['field' => 'цена']),
            'price.numeric' => __('errors.validation.numeric', ['field' => 'цена']),
            'category.required' => __('errors.validation.required', ['field' => 'категория']),
            'category.numeric' => __('errors.validation.numeric', ['field' => 'категория']),
            'stock.*.required' => __('errors.validation.required', ['field' => 'склад']),
            'stock-count.*.required' => __('errors.validation.required', ['field' => 'количество со склада']),
            'stock-count.*.numeric' => __('errors.validation.numeric', ['field' => 'количество со склада']),
            'stock-count.*.min' => __('errors.validation.min', ['field' => 'количество со склада', 'value' => '1']),
        ];
    }
}
