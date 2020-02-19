<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;

class Tag extends Model
{
    public function getRouteKeyName() {
        return 'name';
    }
    
    //
    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }
}
