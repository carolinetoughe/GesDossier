<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Disponibilite extends Model
{
     /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'user_id','lundi','mardi','mercredi','jeudi','vendredi'
    ];
public function user()
{
    return $this->belongsTo('App\User');
}
}
