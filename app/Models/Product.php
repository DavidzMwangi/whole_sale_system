<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function Supply(){
        return $this->hasOne(Supply::class,'id','supplies_id');
    }
}
