<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
      protected $table='banner';
    protected $fillable=['image','order'];

    public function item(){
        return $this->hasOne('App\Models\Item','id','item_id');
    }
}
