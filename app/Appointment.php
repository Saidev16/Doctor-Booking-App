<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{
    protected $guarded = [];
    
    public function doctor(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
