<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'email',
        'phone',
        'address',
        'linkedin',
        'github',
        'codeforces',
        'website',
        'photo',
        'bio',
        'date_of_birth',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
