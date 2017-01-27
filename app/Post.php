<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Country;
class Post extends Model
{
	   public function category(){
		return $this->belongsTo('App\Category');
	}
	 public function country(){
		return $this->belongsTo('App\Country');
	}
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}

	  public function images(){
	        return $this->hasMany('App\PostImage');
	}
}
