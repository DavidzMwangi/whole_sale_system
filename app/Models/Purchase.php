<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    public function Supply()
    {
        return $this->hasOne(Supply::class,'id','supply_id');
    }

    public function Buyer()
    {
        return $this->hasOne(Buyer::class,'id','buyer_id');
    }
}
