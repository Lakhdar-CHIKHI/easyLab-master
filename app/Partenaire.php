<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

   


    public function stages()
    {
    	return $this->hasMany('App\Stage');
    }
    public function contacts()
    {
    	return $this->hasMany('App\Contact');
    }
    public function create_id()
    {
        return $this->belongsTo('App\User');
    }
}
