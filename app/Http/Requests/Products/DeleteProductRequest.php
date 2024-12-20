<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'product_id'=>'required|exists:products,id',
        ];
    }

    public function messages(): array
    {
        return [
            "product_id.required" => "كود الصنف مطلوب",
            "product_id.exists" => "يجب ان يكون كود الصنف موجود بالفعل",
        ];
    }
}
