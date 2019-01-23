<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actualites extends Model
{
    public function createur()
    {
        //foreign key de role-id dans la table users
        return $this->belongsTo('App\User','user_id');
    }
}
