<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'Popular',
        'price',
        'image',
        'meta_title',
        'meta_desc',
        'meta_keywords',
    ];
}
