<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable =['name','phone','city_id','address'];

    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
