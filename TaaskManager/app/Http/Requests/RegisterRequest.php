<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name'=>'required',
            'email'=>'email|required|unique:users,email',
            'password'=>'required',
            'sure_password'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'name is required',
            'email.required'=>'email is required',
            'email.unique'=>'email is unique',
            'email.email'=>'email is not valid',
            'password.required'=>'password is required',
            'sure_password.required'=>'you should enter your password again',
        ];
    }
}
