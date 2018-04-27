<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    public function Supplier(){
        return $this->hasOne(Supplier::class,'id','supplier_id');
//        return $this->belongsTo('app\Models\Supplier');
    }
    public function Unit(){
        return $this->hasOne(Unit::class,'id','unit_id');
    }
}
