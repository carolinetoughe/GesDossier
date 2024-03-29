<?php

namespace App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'nom','prenom','civilite','pieceidentite', 'dossier', 'sexe','datenaissance','adresse','nationalite','groupesanguin','numerotelephone','nomurgence','numerourgence','image','email','password',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot(){

        parent::boot();

        self::creating(function($model){
            
            $model->dossier = str_random(10);
        });
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
    public function ficheanalyses()
    {
        return $this->hasMany(Ficheanalyse::class);
    }
    public function rdvs()
    {
        return $this->hasMany(Rdv::class);
    }
    public function antecedents()
    {
        return $this->hasMany(Antecedent::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }


}
