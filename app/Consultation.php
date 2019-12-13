<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Service;

class Consultation extends Model
{
     /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'date','user_id','patient_id','taille_patient','poids_patient','pression_patient','motif', 'diagnostique'
    ];
    public function user()
{
    return $this->belongsTo('App\User');
}
public function patient()
{
    return $this->belongsTo('App\Patient');
}
public function ficheanalyse()
{
    return $this->hasOne('App\Ficheanalyse');
}
}
