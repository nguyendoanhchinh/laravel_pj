<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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

            'email' => 'required|email|string|unique:users,email,'.$this->id. '',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',


        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Người dùng chưa nhập email.',
            'email.email' => 'Email chưa đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'email.string' => 'Email phải là dạng ký tự.',
            'name.required' => 'Người dùng chưa nhập họ tên.',
            'name.string' => 'Họ tên phải là dạng ký tự.',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên.',

        ];
    }
}
