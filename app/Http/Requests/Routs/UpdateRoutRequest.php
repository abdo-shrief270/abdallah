<?php

namespace App\Http\Requests\Routs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoutRequest extends FormRequest
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
            'rout_id'=>'required|exists:routs,id',
            'name' => 'required|unique:routs,name,'.request('rout_id'),
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
