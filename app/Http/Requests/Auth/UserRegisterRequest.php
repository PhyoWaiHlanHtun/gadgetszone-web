<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            // 'phone' => 'required|numeric|digits_between:7,16',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required',
            'referral' => 'required',
            // 'agree' => 'required'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => '* Required',
            '*.max' => '* Too Long',
            '*.email' => '* Invalid Format',
            '*.numeric' => '* Invalid Format',
            '*.regex' => '* Invalid Format',
            '*.digits_between' => '* Invalid Format',
            '*.unique' => '* Already Taken',
            'password.same' => '* Password does not match'
        ];
    }
}
