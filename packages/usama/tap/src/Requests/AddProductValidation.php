<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CurrencyCode' => 'required|alpha',
            'ImgUrl' => 'url|nullable',
            'Quantity' => 'required|digits_between:1,10',
            'TotalPrice' => 'required|digits',
            'UnitDesc' => 'alpha_numeric|nullable',
            'UnitID' => 'alpha_numeric|nullable',
            'UnitName' => 'required|alpha_numeric',
            'UnitPrice' => 'required|integer',
            'VndID' => 'nullable'
        ];
    }
}
