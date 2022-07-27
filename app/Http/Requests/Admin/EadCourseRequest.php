<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EadCourseRequest extends FormRequest
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
            'title' =>  'required|min:1|max:191',
            'description' => 'required|min:1|max:255',
            'cover' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
            'price' => 'nullable|min:0|max:99999999|number',
            'available' => 'required|boolean',
        ];
    }
}
