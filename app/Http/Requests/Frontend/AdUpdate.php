<?php

namespace App\Http\Requests\Frontend;

use App\Models\AdMeta;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdUpdate extends FormRequest
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
            'title' => 'required|max:200', // required
            'description' => 'max:1500', // required
            'image' => 'image', // required
            'images' => 'array',
            'price' => 'required|numeric', // required
            'category_id' => 'required|exists:categories,id', // required
            'mobile' => 'numeric|nullable',
            'brand_id' => 'nullable|exists:brands,id',
            'model_id' => 'nullable|exists:models,id',
            'is_new' => 'nullable|boolean',
            'manufacturing_year' => ['nullable', 'digits_between:1,4'],
            'mileage' => 'numeric|nullable',
            'transmission' => 'nullable|numeric',
            'room_no' => 'nullable|digits_between:1,2',
            'floor_no' => 'nullable|digits_between:1,2',
            'bathroom_no' => 'nullable|digits:1',
            'rent_type' => ['nullable', Rule::in(AdMeta::getEnumValues('ad_metas', 'rent_type'))],
            'building_age' => 'nullable|digits_between:1,4',
            'is_furnished' => 'nullable|boolean',
            'space' => 'nullable',
            'address' => 'max:500|nullable',
            'user_id' => 'numeric',
//            'area_id' => 'required|numeric|exists:areas,id',
//            'city_id' => 'required|numeric'
        ];
    }
}
