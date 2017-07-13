<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdStore extends FormRequest
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
            'title' => 'required|max:500',
            'description' => 'required|max:1500',
            'image' => 'required|mimes:jpg,png,jpeg,bmp',
            'price' => 'required|numeric'
        ];
    }
}
