<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineJudge extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform_name',
        'username',
        'rating',
        'problems_solved',
        'profile_url',
        'order',
    ];

    /**
     * Scope to order online judges by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}
