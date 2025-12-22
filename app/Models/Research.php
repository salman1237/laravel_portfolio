<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = 'research';

    protected $fillable = [
        'title',
        'type',
        'authors',
        'publication',
        'published_date',
        'url',
        'description',
        'order'
    ];

    protected $casts = [
        'published_date' => 'date',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
