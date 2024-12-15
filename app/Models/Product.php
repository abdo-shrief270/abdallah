<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['name','code','net_price','discount','price','available_quantity','active'];

}
