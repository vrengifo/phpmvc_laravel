<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\User;
use App\Comment;
use App\Tag;

/**
 * Model: Post
 */
class Post extends Model
{
    //
    //protected $primaryKey = 'slug';

    // allowed fields
    protected $fillable = ['title','slug','body',
                            'user_id','category_id'];

    // use 'slug' as a key
    public function getRouteKeyName() {
        return 'slug';
    }

    // add to use Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // add to use User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // add to use Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
