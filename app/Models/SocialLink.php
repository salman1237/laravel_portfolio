<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'url',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Default ordering
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('display_order', 'asc');
        });
    }

    // Scope for active links
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
