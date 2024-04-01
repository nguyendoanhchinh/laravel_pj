<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;
class AuthRequest extends FormRequest
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
                        'password' => 'required|min:3',

        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Người dùng chưa nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'password.required' => 'Người dùng chưa nhập mật khẩu',
            'password.min' => 'Người dùng nhập ít nhất 3 kí tự',
        ];
    }
}
