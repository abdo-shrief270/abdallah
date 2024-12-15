<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gov extends Model
{
    protected $fillable =['name','rout_id'];

    public function rout() : BelongsTo
    {
        return $this->belongsTo(Rout::class);
    }
}
