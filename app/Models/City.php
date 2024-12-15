<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    protected $fillable =['name','gov_id'];

    public function gov() : BelongsTo
    {
        return $this->belongsTo(Gov::class);
    }

}
