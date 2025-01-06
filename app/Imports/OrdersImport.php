<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class OrdersImport implements  ToModel, WithHeadingRow, WithValidation
{
    protected $rowIndex = 2;
    public function model(array $row)
    {
        DB::beginTransaction();
        $currentRow = $this->rowIndex++;
        // Find product and city using the row data
        $product = Product::findOrFail($row['kod_alsnf']);
        if(!$row['kod_alaamyl']){
            $customer = Customer::create([
                'name'=>$row['asm_alaamyl'],
                'phone'=>$row['rkm_alaamyl'],
                'city_id'=>$row['kod_almrkz'],
                'address'=>$row['alaanoan'],
            ]);
        }else{
            $customer = Customer::findOrFail($row['kod_alaamyl']);
        }
        $errors = [];

        // Check if the available quantity is less than the requested quantity
        if ($product->available_quantity < $row['alkmy']) {
            $errors[] = "Row {$currentRow}: كمية الصنف المتاحة أصغر من الكمية المطلوبة: " . $product->name;
        }

        // If errors exist, store them in the session and return null to skip this row
        if (!empty($errors)) {
            // Store errors in session with row index
            throw new \Exception("الصف {$currentRow}: كمية الصنف المتاحة أقل من الكمية المطلوبة: " . $product->name);
            return null; // Skip the row
        }

        // Update the product's available quantity
        $product->available_quantity -= $row['alkmy'];
        $product->save();

        DB::commit();
        // Create and return the order model
        return new Order([
            'customer_id'       => $customer->id,
            'user_id'           => $row['kod_almndob']??null,
            'product_id'        => $row['kod_alsnf'],
            'quantity'          => $row['alkmy'],
            'add_discount'      => $row['alkhsm_aladafy'],
            'discount'          => $product->discount + $row['alkhsm_aladafy'],
            'total_price'       => (($product->price * $row['alkmy']) + $customer->city->ship_cost) * (1 - $row['alkhsm_aladafy'] / 100),
            'status'            => 'new'
        ]);
    }

    public function rules(): array
    {
        // Add rules for validation before importing
        return [
            'kod_alaamyl' => 'nullable|exists:customers,id', // Ensure the product exists
            'asm_alaamyl' => 'nullable|string', // Ensure the product exists
            'rkm_alaamyl' => 'nullable', // Ensure the product exists
            'kod_almrkz' => 'nullable|exists:cities,id', // Ensure the product exists
            'alaanoan' => 'nullable|string', // Ensure the product exists
            'kod_alsnf' => 'required|exists:products,id', // Ensure the product exists
            'alkmy' => 'required|integer|min:1', // Ensure quantity is a positive integer
            'alkhsm_aladafy' => 'nullable|numeric|min:0|max:100', // Discount should be between 0 and 100
        ];
    }

    // Optionally, you could define custom validation messages
    public function customValidationMessages()
    {
        return [
            'kod_alsnf.required' => 'كود الصنف مطلوب',
            'alkmy.required' => 'كيمة الصنف مطلوبة',
            'alkhsm_aladafy.numeric' => 'الخصم يجب ان يكون رقم',
            'alkhsm_aladafy.min' => 'الخصم لا يمكن ان يكون اقل من 0',
            'alkhsm_aladafy.max' => 'الخصم لا يمكن ان يكون اكثر من 100',
        ];
    }
}
