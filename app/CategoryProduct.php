<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $table = 'type_products';

    function product(){
        return $this->hasMany('App\Product','id_type','id');
    }
}
