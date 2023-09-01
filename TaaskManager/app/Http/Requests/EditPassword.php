<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPassword extends FormRequest
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
            'old_password'=>'required',
            'new_password'=>'required',
            'new_password2'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'old_password.required'=>'old password is required',
            'new_password.required'=>'new password is required',
            'new_password2.required'=>'retype password is required',
        ];
    }
}
