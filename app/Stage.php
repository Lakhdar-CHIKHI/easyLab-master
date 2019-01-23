<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
     use SoftDeletes;

     protected $dates = ['deleted_at'];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function partenaire()
    {
        return $this->belongsTo('App\Partenaire');
    }
    public function encext()
    {
        return $this->belongsTo('App\Contact',"encadreur_ext");
    }
    public function cooencext()
    {
        return $this->belongsTo('App\Contact',"coencadreur_ext");
    }
}
