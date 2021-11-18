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

    public function getAll()
    {
        return $this->postRepository->getAllPost();
    }

    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function savePostData($data)
    {
        return $this->postRepository->save($data);
    }
}
