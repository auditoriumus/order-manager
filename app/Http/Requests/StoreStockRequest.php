<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockRequest extends FormRequest
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
            'measure_unit' => 'required',
            'count' => 'numeric|required',
            'per_price' => 'numeric|required',
            'total_price' => 'numeric|required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('errors.validation.required', ['field' => 'название']),
            'measure_unit.required' => __('errors.validation.required', ['field' => 'еденица измерения']),
            'count.required' => __('errors.validation.required', ['field' => 'количество']),
            'count.numeric' => __('errors.validation.numeric', ['field' => 'количество']),
            'per_price.required' => __('errors.validation.required', ['field' => 'цена за единицу']),
            'per_price.numeric' => __('errors.validation.numeric', ['field' => 'цена за единицу']),
            'total_price.required' => __('errors.validation.required', ['field' => 'общая цена']),
            'total_price.numeric' => __('errors.validation.numeric', ['field' => 'общая цена']),
        ];
    }
}
