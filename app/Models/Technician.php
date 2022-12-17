<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $table = 'technicians';
    protected $fillable = [
        'service_id',
        'name',
        'age',
        'email',
        'password',
        'phone',
        'photo',
        'nid',
        'nid_photo',
        'verified',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id','id');
    }
}
