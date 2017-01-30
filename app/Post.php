<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Country;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
	use SoftDeletes;
	 protected $dates = ['deleted_at'];

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
