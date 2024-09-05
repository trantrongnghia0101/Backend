<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'email.required'=> 'Bạn không được để trống email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng, ví dụ: abc@gmail.com',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
        ];

    }
}
