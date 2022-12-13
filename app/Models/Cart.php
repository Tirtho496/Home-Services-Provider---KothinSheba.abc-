<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillabe = [
        'user_id',
        'service_id',
        'date',
        'slot_id',
        'technician_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class,'technician_id','id');
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class,'slot_id','id');
    }
}
