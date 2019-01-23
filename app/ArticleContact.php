<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ArticleContact extends Model
{    use SoftDeletes;
    protected $table = "article_contact";
}
