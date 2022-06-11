<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // protected $table = "categories";
    public function medicines(){
        return $this->hasMany('App\Medicine','category_id','id');
        // return $this->hasMany('App\Medicine');
    }
}
