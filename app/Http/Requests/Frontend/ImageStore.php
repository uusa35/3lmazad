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
        return $this->authorize('isOwner', auth()->user()->id);;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|mimes:jpeg,png,jpg|max:2000',
            'description_ar' => 'alpha_numeric|nullable',
            'description_en' => 'alpha_numeric|nullable',
        ];
    }
}
