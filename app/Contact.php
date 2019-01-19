<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contact extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'adresse_mail', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function thesese()
    {
        return $this->hasMany('App\These',"encadreur_ext");
    }
    public function thesesc()
    {
        return $this->hasMany('App\These',"coencadreur_ext");
    }
    public function partenaire()
    {
        return $this->belongsTo('App\Partenaire');
    }
    


    public function projet()
    {
        return $this->hasOne('App\Projet');
    }

     public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public function projets()
    {
        return $this->belongsToMany('App\Projet');
    }
    
    public function role()
    {
        //foreign key de role-id dans la table users
        return $this->belongsTo(Role::class);
    }
}
