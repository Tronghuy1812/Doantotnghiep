<?php

namespace Modules\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherCourseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'c_name' => 'required',
            'c_price' => 'required',
            'c_category_id' => 'required',
            'c_slug' => 'required|unique:courses,c_slug,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Dữ liệu không được để trống',
            'c_category_id.required' => 'Dữ liệu không được để trống',
            'c_price.required' => 'Dữ liệu không được để trống',
            'c_slug.required' => 'Dữ liệu không được để trống',
            'c_slug.unique'   => 'Slug đã tồn tại',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
