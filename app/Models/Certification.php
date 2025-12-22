<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'institution',
        'location',
        'start_date',
        'end_date',
        'description',
        'credential_url',
        'order'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
