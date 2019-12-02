<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $table= 'rdvs';
    protected $fillable = [
        'code','titre','couleur','start_date','end_date','patient_id'
    ];
    public function patient()
{
    return $this->belongsTo('App\Patient');
}
}
