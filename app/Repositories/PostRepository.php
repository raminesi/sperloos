<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAllPost()
    {
        return $this->post->get();
    }

    public function getById($id)
    {
        return $this->post->where('id' , $id)->get();
    }

    public function save($data)
    {
        $post = new $this->post;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();
        return $post->fresh();
    }
}
