<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|unique:users,phone',
            'id_number' => 'required|unique:users,id_number',
            'rout_id' => 'required|exists:routs,id',
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "اسم المندوب مطلوب",
            "name.string" => "يجب ان يكون اسم المندوب عبارة عن نص",
            "phone.required" => "رقم تليفون المندوب مطلوب",
            "phone.unique" => "رقم تليفون المندوب موجود بالفعل",
            "id_number.required" => "رقم بطاقة المندوب مطلوب",
            "id_number.unique" => "رقم بطاقة المندوب موجود بالفعل",
            "rout_id.required" => "كود خط السير مطلوب",
            "rout_id.exists" => "يجب ان يكون كود خط السير موجود بالفعل",
        ];
    }
}
