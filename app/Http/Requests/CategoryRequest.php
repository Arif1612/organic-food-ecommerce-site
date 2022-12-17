<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $imageValidationRules = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if ($this->isMethod('post')) {
            $imageValidationRules = 'required|' . $imageValidationRules;
        }
        return [
            'name' => 'required|min:03|max:255|unique:categories,name,' . $this->id,
            'image' => $imageValidationRules
        ];
    }


    // public function messages()
    // {
    //     return [
    //         'name.required' => 'A name is required',
    //     ];
    // }
}
