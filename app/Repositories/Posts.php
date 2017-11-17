<?php

namespace App\Repositories;

use App\Post;

/**
 * Class Posts
 * @package App\Repositories
 */
class Posts
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
         return Post::all();
    }

    /**
     * @param array $param
     * @return mixed
     */
    public function filter(array $param)
    {
        //TODO: Improve this.
        return Post::latest()->filter($param)->get();
    }
}