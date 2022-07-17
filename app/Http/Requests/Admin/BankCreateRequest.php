<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BankCreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'account' => 'required_without:phone',
            'phone' => 'required_without:account',
            'images' => 'required|array|min:1|max:1',
            'images.*' => 'required|mimes:jpg,jpeg,png|max:5000',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => '* Required',
            '*.required_without' => '* Required',
            '*.max' => '* Too Long',
            '*.email' => '* Invalid Format',
            '*.numeric' => '* Invalid Format',
            '*.mimes' => '* Invalid Format'
        ];
    }
}
