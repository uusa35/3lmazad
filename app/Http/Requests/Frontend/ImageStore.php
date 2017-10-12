<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ImageStore extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.between' => trans('message.image_store_error_exceed_the_limit'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gallery_id' => 'required|numeric',
            'remaining' => 'numeric|between:1,'.$this->remaining,
            'image' => 'mimes:jpeg,jpg,bmp,png|required',
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
        ];
    }
}
