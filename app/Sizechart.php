<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sizechart extends Model
{
    public function products(){
      return $this->hasMany('App\Product');
    }
}
