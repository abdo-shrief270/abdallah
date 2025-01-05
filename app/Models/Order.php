<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','user_id','product_id','quantity','add_discount','total_price','status'];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class)->with('gov');
    }

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class)->with('city');
    }


}
