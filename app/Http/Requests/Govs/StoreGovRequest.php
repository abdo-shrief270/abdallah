<?php

namespace App\Http\Requests\Govs;

use Illuminate\Foundation\Http\FormRequest;

class StoreGovRequest extends FormRequest
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
            'name' => 'required|string|unique:govs,name',
            'rout_id' => 'required|exists:routs,id'
        ];
    }

    public function messages(): array
    {
        return [
            "rout_id.required" => "كود خط السير مطلوب",
            "rout_id.exists" => "يجب ان يكون كود خط السير موجود بالفعل",
            "name.required" => "اسم خد السير مطلوب",
            "name.unique" => "هذا الاسم مدخل من قبل"
        ];
    }
}
