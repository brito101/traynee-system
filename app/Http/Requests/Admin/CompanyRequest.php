<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'social_name' => 'required|min:3|max:100',
            'alias_name' => 'required|min:3|max:100',
            // 'document_company' => 'required|min:14|max:18',
            // 'document_company_secondary' => 'min:5|max:100',
            'telephone' => 'required|min:8|max:25',
            'cell' => 'min:8|max:25',
            // 'zipcode' => 'required|min:8|max:13',
            // 'street' => 'required|min:3|max:100',
            // 'number' => 'required|min:1|max:100',
            // 'complement' => 'min:3|max:100',
            // 'neighborhood' => 'min:3|max:100',
            // 'state' => 'required|min:2|max:3',
            // 'city' => 'required|min:2|max:100'
        ];
    }
}
