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

    public function getListPost($limit)
    {
        $list = $this->post->paginate($limit);
        $posts  = $list->map(function($item){
            return array(
                'id' => $item->id,
                'title' => $item->title,
                'content' => $item->content,
                'thumbnail' => (is_null($item->thumbnail) ? null : $item->thumbnail->getUrl('thumb'))
            );
        });
        return $posts;
    }

    public function getById($id)
    {
        $post = $this->post->where('id' , $id)->first();
        return array(
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'thumbnail' => (is_null($post->thumbnail) ? null : $post->thumbnail->getUrl('thumb')),
            'image' => (is_null($post->thumbnail) ? null : $post->thumbnail->getUrl())
        );
    }

    public function save($data)
    {
        $post = new $this->post;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();
        $post->addMediaFromRequest('image')->usingName($data['title'])->toMediaCollection('thumbnail');
        return $post->fresh();
    }

    public function update($data , $id)
    {
        $post = $this->post->find($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->update();
        if(!empty($data['image'])){
            $post->addMediaFromRequest('image')->usingName($data['title'])->toMediaCollection('thumbnail');
        }
        return $post->fresh();
    }
}
