<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

/**
 * Model: Comment
 */
class Comment extends Model
{
    // fields allowed
    protected $fillable = ['body','user_id','post_id',
                            'approved'];

    public function post()
    {
        // one comment belongs to one comment
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        // one comment belongs to one user
        return $this->belongsTo(User::class);
    }
}
