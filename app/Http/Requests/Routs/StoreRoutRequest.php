<?php

namespace App\Http\Requests\Routs;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoutRequest extends FormRequest
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
            'name' => 'required|unique:routs,name'
        ];
    }
    public function messages(): array
    {
        return [
            "name.required" => "اسم خد السير مطلوب",
            "name.unique" => "هذا الاسم مدخل من قبل"
        ];
    }
}
