<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
     /**
     * Get the comments for the blog post.
     */
    public function arts()
    {
        return $this->hasMany('App\Art');
    }
}
