<?php

namespace App\Repositories;

use App\Post;

class PostRepository extends ResourceRepository
{



    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    private function queryPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideo()
    {
        return $this->model->with('user', 'tags','video','image','link','document')
            ->orderBy('posts.created_at', 'desc');
    }

    public function getPostByIdWithUserAndTagsAndLinkAndDocumentAndImageAndVideo($id)
    {
        return $this->queryPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideo()->where('id', $id)->first();
    }

    public function getPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideoPaginate($n)
    {
        return $this->queryPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideo()->paginate($n);
    }

    public function getPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideoForTagPaginate($tag, $n)
    {
        return $this->queryPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideo()
            ->whereHas('tags', function($query) use ($tag)
            {
                $query->where('tags.tag_url', $tag);
            })->paginate($n);
    }



}