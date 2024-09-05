<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'image' => 'nullable|string',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'status' => 'required|string',
            'roles' => 'array|exists:roles,id',
        ];
    }

    public function messages(): array {
        return [
            'email.required'=> 'Bạn không được để trống email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng, ví dụ: abc@gmail.com',
            'email.string'=> 'Email phải ở dạng ký tự',
            'name.string'=> 'Họ và Tên phải ở dạng ký tự',
            'email.unique'=> 'Email này đã tồn tại',
            'name.required'=> 'Bạn chưa nhâpj Họ và Tên',
        ];

    }
}
