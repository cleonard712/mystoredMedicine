<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\user','id');
    }
    public function buyer()
    {
        return $this->belongsTo('App\buyer','id');
    }
    public function medicines(){
        return $this->belongsToMany('App\medicine','medicine_transaction','transaction_id','medicine_id')
        ->withPivot('quantity','price');
    }
    public function form_submit_front(){
        $this->authorize('checkmember');
        return view('frontend.checkout');
    }

    public function submit_front()
    {
        $this->authorize('checkmember');
    }
}
