<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'technologies',
        'github_url',
        'demo_url',
        'image',
        'order',
    ];

    /**
     * Cast technologies to array
     */
    protected $casts = [
        'technologies' => 'array',
    ];

    /**
     * Scope to order projects by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}
