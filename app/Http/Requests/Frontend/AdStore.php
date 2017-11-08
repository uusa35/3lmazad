<?php

namespace App\Http\Requests\Frontend;

use App\Models\Ad;
use App\Models\AdMeta;
use App\Models\Area;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->id == $this->user_id;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
//    public function messages()
//    {
//        return [
//            '*.numeric' => ':attribute ' . trans('message.error_numeric'),
//            '*.required' => ':attribute ' . trans('message.error_required'),
//            '*.rule' => ':attribute ' . trans('message.error_invalid'),
//        ];
//    }

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
            'image' => 'required|image', // required
            'images' => 'array|nullable',
            'price' => 'nullable', // required
            'category_id' => 'required|exists:categories,id', // required
            'mobile' => 'numeric|nullable',
            'area_id' => 'nullable|exists:areas,id',
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
            'address' => 'nullable|max:500',
            'user_id' => 'required|numeric',
            'area_id' => 'required|numeric',
            'city_id' => 'required|numeric'
        ];
    }
}
