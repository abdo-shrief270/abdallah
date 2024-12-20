<?php

namespace App\Http\Requests\Cities;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
            'city_id' => 'required|exists:cities,id',
            'name' =>'required|string|max:255',
            'gov_id' => 'required|exists:govs,id'
        ];
    }

    public function messages(): array
    {
        return [
            "gov_id.required" => "كود المنطقة مطلوب",
            "gov_id.exists" => "يجب ان يكون كود     المنطقة موجود بالفعل",
            "city_id.required" => "كود المركز مطلوب",
            "city_id.exists" => "يجب ان يكون كود المركز موجود بالفعل",
            "name.required" => "اسم خد السير مطلوب",
            "name.unique" => "هذا الاسم مدخل من قبل"
        ];
    }
}
