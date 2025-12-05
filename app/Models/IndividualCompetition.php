<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualCompetition extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'rating',
        'max_rating',
        'problems_solved',
        'rank',
        'profile_url',
        'order',
    ];

    /**
     * Scope to order competitions by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}
