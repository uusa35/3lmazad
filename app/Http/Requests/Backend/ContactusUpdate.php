<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ContactusUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar' => 'required|min:3',
            'name_en' => 'required|min:3',
            'facebook_url' => 'url',
            'twitter_url' => 'url',
            'instagram_url' => 'url',
            'youtube_url' => 'url',
            'phone' => 'numeric',
            'mobile' => 'numeric',
            'email' => 'email',
            'address' => '',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'logo' => 'mimes:jpeg,bmp,png',
        ];
    }
}
