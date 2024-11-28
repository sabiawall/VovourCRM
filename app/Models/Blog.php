<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'source',
        'image',
        'details',
    ];
}
