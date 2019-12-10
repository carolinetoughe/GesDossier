<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
     /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'date','consultation_id','details'
    ];
    public function consultation()
    {
        return $this->belongsTo('App\Consultation');
    }
}
