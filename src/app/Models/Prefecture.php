<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    public $timestamps = false;

    public function scopeOrdered($query)
    {
        return $query->orderBy('id');
    }
}
