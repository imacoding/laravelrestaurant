<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $fillable=['user_id','order_total','razorpay_payment_id','payment_type','address','promocode'];

    public function users(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
