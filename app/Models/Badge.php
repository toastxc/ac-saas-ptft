<?php

namespace App\Models;

use Database\Factories\BadgeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    /** @use HasFactory<BadgeFactory> */
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'label',
        'color',
    ];
}
