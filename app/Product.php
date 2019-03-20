<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function order(){
      return $this->belongsTo('App\Order');
    }

    public function brand(){
      return $this->belongsTo('App\Brand');
    }

    public function sizes(){
      return $this->hasMany('App\ProductSize');
    }

    public function sizecharts(){
      return $this->hasMany('App\Sizechart');
    }
}
