<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    protected $fillable = [
        'nom','patient_id','traitement'
    ];
    public function patient()
{
    return $this->belongsTo('App\Patient');
}}
