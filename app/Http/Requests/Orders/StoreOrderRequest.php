<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
//        'code','customer_name','customer_phone','user_id','product_id','quantity','net_price','discount','total_price','address','city_id','status'
        return [
            'customer_name'=>'required|string|max:50',
            'customer_phone'=>'required|string|max:20',
            'user_id'=>'required|exists:users,id',
            'product_id'=>'required|exists:products,id',
            'quantity'=>'required|integer|min:0',
            'add_discount'=>'required|numeric|min:0',
            'address'=>'required|string|max:100',
            'city_id'=>'required|exists:cities,id',
        ];
    }
}
