<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SliderStore extends FormRequest
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
            'title' => 'required:min:3',
            'url' => 'required:url',
            'image' => 'required:mimes:jpeg,jpg,png',
            'order' => 'required|digits:1',
            'active' => 'required|boolean',
        ];
    }
}
