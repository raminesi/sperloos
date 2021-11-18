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
        $posts = $this->post->get();
        return $posts;
    }

    public function getById($id)
    {
        $post = $this->post->where('id' , $id)->first();
        $post->getMedia('thumbnail');
        return array(
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'thumbnail' => ($post->media[0] ? $post->media[0]->getUrl() : null)
        );
    }

    public function save($data)
    {
        $post = new $this->post;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();
        $post->addMediaFromRequest('image')->usingName($data['title'])->toMediaCollection('thumbnail');
        // $post->addMediaConversion('thumb')
        // ->width(100)
        // ->height(100)
        // ->sharpen(10)
        // ->nonOptimized();
        return $post->fresh();
    }
}
