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
            'social_name' => 'max:100',
            'alias_name' => 'max:100',
            'document_company' => "max:18|unique:companies,document_company,{$this->id},id,deleted_at,NULL",
            'document_company_secondary' => 'max:100',
            'email' => "max:100|unique:companies,email,{$this->id},id,deleted_at,NULL",
            'telephone' => 'max:25',
            'cell' => 'max:25',
            'zipcode' => 'max:13',
            'street' => 'max:100',
            'number' => 'max:100',
            'complement' => 'max:100',
            'neighborhood' => 'max:100',
            'state' => 'max:3',
            'city' => 'max:100',
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024|dimensions:max_width=1800,max_height=1800',
            'resume' => 'nullable',
            'facebook' => 'nullable|url|max:150',
            'instagram' => 'nullable|url|max:150',
            'twitter' => 'nullable|url|max:150',
            'linkedin' => 'nullable|url|max:150',
            'youtube' => 'nullable|url|max:150',
            'whatsapp' => 'nullable|url|max:150',
            'telegram' => 'nullable|url|max:150',
            'discord' => 'nullable|nullable|url|max:150',
            'brand_facebook' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024|dimensions:max_width=1800,max_height=1800',
            'brand_instagram' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024|dimensions:max_width=1800,max_height=1800',
            'brand_twitter' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024|dimensions:max_width=1800,max_height=1800'
        ];
    }
}
