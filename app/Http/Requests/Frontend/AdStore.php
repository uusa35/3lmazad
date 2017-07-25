<?php

namespace App\Http\Requests\Frontend;

use App\Models\Ad;
use App\Models\AdMeta;
use App\Models\Area;
use App\Models\Category;
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
            '*.numeric' => ':attribute ' . trans('message.error_numeric'),
            '*.required' => ':attribute ' . trans('message.error_required'),
            '*.rule' => ':attribute ' . trans('message.error_invalid'),
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
            'title' => 'required|max:200', // required
            'description' => 'required|max:1500', // required
            'image' => 'image', // required
            'images' => 'array|nullable',
            'price' => 'required|numeric', // required
            'category_id' => ['required', Rule::in(Category::all()->pluck('id')->toArray())], // required
            'mobile' => 'numeric|nullable',
            'area_id' => ['nullable', Rule::in(Area::all()->pluck('id')->toArray())],
            'condition' => 'nullable|numeric',
            'manufacturing_year' => ['nullable', 'digits_between:1,4', Rule::in(range(date('Y') - 25, date('Y')))],
            'mileage' => 'numeric|nullable',
            'transmission' => 'nullable|numeric',
            'room_no' => 'nullable|digits_between:1,2',
            'floor_no' => 'nullable|digits_between:1,2',
            'bathroom_no' => 'nullable|digits:1',
            'rent_type' => ['nullable', Rule::in(AdMeta::getEnumValues('ad_metas', 'rent_type'))],
            'building_age' => 'nullable|digits_between:1,4',
            'furnished' => 'nullable|boolean',
            'space' => 'nullable|numeric',
            'address' => 'nullable|alpha_num',
        ];
    }
}
