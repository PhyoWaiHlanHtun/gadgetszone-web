<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
            'username' => 'required|max:100',
            // 'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits_between:7,16',
            'password' => 'nullable|same:confirm-password',
            'confirm-password' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '* Username is Required',
            'username.max' => '* Username is Too Long',
            // '*.email' => '* Invalid Format',
            'phone.numeric' => '* Your Phone is Invalid Format',
            'phone.digits_between' => '* Your Phone is Invalid Format',
            '*.unique' => '* Already Taken',
            'password.same' => '* Password does not match'
        ];
    }
}
