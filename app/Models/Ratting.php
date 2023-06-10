<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    use HasFactory;
    protected $table='ratting';
    protected $fillable=['user_id','ratting','comment'];

    public function users(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
