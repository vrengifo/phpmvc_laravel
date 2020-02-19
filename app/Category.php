<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;


/**
 * Model: Category
 */
class Category extends Model
{

    public function getRouteKeyName() {
        return 'name';
    }

    public function posts()
    {
        // one category has many Posts
        return $this->hasMany(Post::class);
    }
}
