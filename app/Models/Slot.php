<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $table = 'slots';
    protected $fillable = [
        'service_id',
        'start_time',
        'end_time',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id','id');
    }
}
