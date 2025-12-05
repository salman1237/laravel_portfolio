<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree',
        'institution',
        'field_of_study',
        'start_date',
        'end_date',
        'cgpa',
        'description',
        'order',
    ];

    /**
     * Cast dates to Carbon instances
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Scope to order education by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('start_date', 'desc')->orderBy('id', 'asc');
    }
}
