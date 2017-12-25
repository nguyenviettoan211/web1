<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = 'bills';

    function customer(){
        return $this->belongsTo('App\Customer','id_customer','id');
    }

    function billDetail(){
        return $this->hasMany('App\BillDetail','id_bill','id');
    }
}
