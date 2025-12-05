<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCompetition extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_name',
        'year',
        'team_name',
        'rank',
        'award',
        'order',
    ];

    /**
     * Scope to order competitions by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('year', 'desc')->orderBy('id', 'asc');
    }
}
