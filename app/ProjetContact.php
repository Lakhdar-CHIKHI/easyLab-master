<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProjetContact extends Model
{  use SoftDeletes;
    protected $table = "contact_projet";

    public function participe()
    {
        return $this->belongsTo('App\User');
    }
}
