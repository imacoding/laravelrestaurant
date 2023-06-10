<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
     protected $table='favorite';
    protected $fillable=['user_id','item_id'];

    public function itemimage(){
        return $this->hasOne('App\Models\ItemImages','item_id','id')->select('id','item_id',"image AS image");
    }
}
