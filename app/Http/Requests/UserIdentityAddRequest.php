<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserIdentityAddRequest extends FormRequest
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
            'name' => 'required',
            'number' => 'required|unique:user_identities,number',
            'front' => 'required|mimes:jpg,jpeg,png|max:5000',
            'back' => 'required|mimes:jpg,jpeg,png|max:5000',
            'selfie' => 'required|mimes:jpg,jpeg,png|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '* ID Name is required',
            'number.required' => '* ID Number is required',
            'front.required' => '* Front Image of ID Card is required',
            'back.required' => '* Back Image of ID Card is required',
            'selfie.required' => '* Holding ID Card Image is required',

            'number.unique' => '* ID Number is already used.',
            'front.mimes' => '* Front Image type of ID Card is invalid',
            'back.mimes' => '* Back Image type of ID Card is invalid',
            'selfie.mimes' => '* Holding ID Card Image type is invalid',

            '*.max' => '* Maximum Image Size is 5 Mb.',
        ];
    }
}
