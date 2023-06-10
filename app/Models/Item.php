<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table='item';
    protected $fillable=['cat_id','item_name','item_description','item_price','delivery_time'];

    public function category(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }

    public function itemimage(){
        return $this->hasOne('App\Models\ItemImages','item_id','id')->select('item_images.id','item_images.item_id', "item_images.image AS image");
    }

    public function itemimagedetails(){
        return $this->hasMany('App\Models\ItemImages','item_id','id')->select('item_id'," image AS itemimage");
    }

    public function ingredients(){
        return $this->hasMany('App\Models\Ingredients','item_id','id')->select('item_id', "image AS ingredients_image");
    }

    public function addons(){
        return $this->hasMany('App\Models\Addons','item_id','id')->select('id','name','price','item_id')->where('is_available','=','1');
    }
}
