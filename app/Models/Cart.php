<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
     protected $table='cart';
    protected $fillable=['user_id','item_id','addons_id','qty','price'];

    public function itemimage(){
        return $this->hasOne('App\Models\ItemImages','item_id','item_id')->select('item_images.id','item_images.item_id',"item_images.image AS image");
    }
}
