<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    
    protected $fillable = [
        'code','date','patient_id','user_id'
    ];
    public function patient()
{
    return $this->belongsTo('App\Patient');
}
public function user()
{
    return $this->belongsTo('App\User');
}
}
