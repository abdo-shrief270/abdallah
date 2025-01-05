<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'order_id' => 'required|exists:orders,id',
            'customer_id'=>'required|exists:customers,id',
            'user_id'=>'required|exists:users,id',
            'product_id'=>'required|exists:products,id',
            'quantity'=>'required|integer|min:0',
            'add_discount'=>'required|numeric|min:0',
        ];
    }
}
