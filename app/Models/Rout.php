<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rout extends Model
{
    protected $fillable =['name'];

    public function gov() : HasMany
    {
        return $this->hasMany(Gov::class)->with('city');
    }
}
