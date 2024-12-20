<?php

namespace App\Http\Requests\Govs;

use Illuminate\Foundation\Http\FormRequest;

class DeleteGovRequest extends FormRequest
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
            'gov_id'=>'required|exists:govs,id',
        ];
    }

    public function messages(): array
    {
        return [
            "gov_id.required" => "كود خط السير مطلوب",
            "gov_id.exists" => "يجب ان يكون كود خط السير موجود بالفعل",
        ];
    }
}
