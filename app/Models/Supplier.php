<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function Supply(){
        return $this->hasMany(Supply::class,'supplier_id','id');
    }
}
