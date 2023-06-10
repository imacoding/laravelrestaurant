<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
     protected $table='order_details';
    protected $fillable=['user_id','order_id','item_id','price','qty'];

    public function itemimage(){
        return $this->hasOne('App\Models\ItemImages','item_id','id')->select('item_images.id','item_images.item_id',"item_images.image AS image");
    }

    public function items(){
        return $this->hasOne('App\Models\Item','id','item_id');
    }
}
