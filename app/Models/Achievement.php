<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'category',
        'position',
        'organization',
        'year',
        'description',
        'order'
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
