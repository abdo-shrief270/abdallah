<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = ['customer_name','customer_phone','user_id','product_id','quantity','add_discount','total_price','address','city_id','status'];
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


}
