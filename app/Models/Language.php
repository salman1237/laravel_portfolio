<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'proficiency',
        'order'
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
