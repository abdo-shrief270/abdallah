<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;
    protected $fillable =['name','gov_id'];

    public function gov() : BelongsTo
    {
        return $this->belongsTo(Gov::class)->with('rout');
    }

}
