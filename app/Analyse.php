<?php

namespace App;
use App\Ficheanalyse;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
     /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'nom','prix'
    ];
    public function ficheanalyses()
{
    return $this->belongsToMany(Ficheanalyse::class,'analyse_ficheanalyse');
}
}