<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedTechnician extends Model
{
    use HasFactory;

    protected $table = 'booked_technicians';
    protected $fillable = [
        'date',
        'slot',
        'technician',
    ];
}
