<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillabe = [
        'user_id',
        'service_id',
        'date',
        'slot_id',
        'technician_id',
        'fname',
        'lname',
        'phone',
        'email',
        'address',
        'city',
        'district',
        'division',
        'status',
        'paystatus',
        'total_price',
        'tracking_no',
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
