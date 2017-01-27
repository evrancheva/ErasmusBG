<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Country extends Model
{
    protected $table ='countries';
     public function posts(){
        return $this->hasMany('App\Post');
}
}
