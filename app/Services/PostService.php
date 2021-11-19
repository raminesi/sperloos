<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getListPost($limit)
    {
        return $this->postRepository->getListPost($limit);
    }

    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function savePostData($data)
    {
        return $this->postRepository->save($data);
    }

    public function updatePost($data , $id)
    {
        return $this->postRepository->update($data , $id);
    }

    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }
}
