<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|min:3|max:50',
            'code' => 'required|string|min:3|max:20|unique:products,code,'.request('product_id'),
            'net_price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|lte:net_price',
            'available_quantity' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            "product_id.required" => "كود الصنف مطلوب",
            "product_id.exists" => "يجب ان يكون كود الصنف موجود بالفعل",
            "code.unique" => "هذا الكود مدخل من قبل",
            "name.string" => "يجب ان يكون اسم الصنف عبارة عن نص",
            "code.string" => "يجب ان يكون كود الصنف عبارة عن نص",
            "net_price.numeric" => "يجب ان يكون السعر الاساسي عبارة عن رقم",
            "net_price.required" => "السعر الاساسي مطلوب",
            "discount.numeric" => "يجب ان يكون سعر الخصم عبارة عن رقم",
            "discount.required" => "سعر الخصم مطلوب",
            "available_quantity.required" => "رقم الكمية مطلوب",
            "available_quantity.numeric" => "يجب ان يكون رقم الكمية عبارة عن رقم",
        ];
    }
}
