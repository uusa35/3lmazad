<?php

namespace App\Http\Requests\Frontend;

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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd($this->request->all());
        return [
            'title' => 'required|max:200',
            'description' => 'required|max:1500',
            'image' => 'required|array',
            'price' => 'required|numeric',
            'category_id' => ['required', Rule::in(Category::all()->pluck('id'))],
            'phone' => 'numeric|nullable',
            'area_id' => ['nullable','digits:1', Rule::in(Area::all()->pluck('id'))],
            'condition' => ['nullable', Rule::in(['new', 'old'])],
            'manufacturing_year' => ['nullable', Rule::in(range(date('Y') - 25, date('Y')))],
            'mileage' => 'numeric|nullable',
            'transmission' => ['nullable', Rule::in(['manual', 'automatic'])],
            'room_no' => 'nullable|digits_between:1,2',
            'floor_no' => 'nullable|digits_between:1,2',
            'bathroom_no' => 'nullable|digits:1',
            'rent_type' => ['nullable', Rule::in(['daily', 'weekly', 'monthly', 'yearly'])],
            'building_age' => 'nullable|digits_between:1,4',
            'furnished' => 'nullable|boolean',
            'space' => 'nullable|numeric',
            'address' => 'nullable|alpha_num',
        ];
    }
}
