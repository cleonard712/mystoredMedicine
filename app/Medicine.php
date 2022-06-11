<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
   // protected $table = "medicines";
    public function category(){
        return $this->belongsTo('App\Category','category_id');
        // return $this->belongsTo('App\Category');
    }
    public function transactions(){
        return $this->belongsToMany('App\transaction','medicine_transaction','medicine_id','transaction_id')
        ->withPivot('quantity','price');
    }
}
