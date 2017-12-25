<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    function billDetail(){
        return $this->hasMany('App\BillDetail','id_bill','id');
    }

    function categoryProduct(){
        return $this->belongsTo('App\CategoryProduct','id_type','id');
    }
}
