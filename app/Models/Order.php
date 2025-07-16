<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }
}
