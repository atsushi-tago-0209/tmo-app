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
        if ($this->path() == 'confirm'){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required',
            'password' => 'required|min:8'
        ];
    }
    public function messages()
    {
        return[
            'email.required'=>'メールアドレスを入力してください。',
            'password.required'=>'パスワードを入力してください。',
            'password.min'=>'パスワードは８文字以上で入力してください。'
        ];
    }
}
