<?php

namespace App\Repositories;

use App\Post;

class PostRepository extends ResourceRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    private function queryPostsWithUserAndTags()
    {
        return $this->model->with('user', 'tags')
            ->orderBy('posts.created_at', 'desc');
    }

    public function getPostByIdWithUserAndTags($id)
    {
        return $this->queryPostsWithUserAndTags()->where('id', $id)->first();
    }

    public function getPostsWithUserAndTagsPaginate($n)
    {
        return $this->queryPostsWithUserAndTags()->paginate($n);
    }

    public function getPostsWithUserAndTagsForTagPaginate($tag, $n)
    {
        return $this->queryPostsWithUserAndTags()
            ->whereHas('tags', function($query) use ($tag)
            {
                $query->where('tags.tag_url', $tag);
            })->paginate($n);
    }



}