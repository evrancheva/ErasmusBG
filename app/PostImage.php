<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
   protected $table = 'image_post';
   public function images(){
	return $this->belongsToMany('App\PostImage','post_image');
}
}
