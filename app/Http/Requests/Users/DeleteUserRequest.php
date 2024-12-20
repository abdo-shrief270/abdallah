<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'=>'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            "user_id.required" => "كود المندوب مطلوب",
            "user_id.exists" => "يجب ان يكون كود المندوب موجود بالفعل",
        ];
    }
}
