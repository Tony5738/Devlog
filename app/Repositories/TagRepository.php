<?php

namespace App\Repositories;

use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagRepository extends ResourceRepository
{



    public function __construct(Tag $tag)
    {
        $this->model = $tag;
    }


    private function attachTagsOnPost($post, $tags)
    {
        if($tags != null)
        {
            $tags = explode(',', $tags);
            foreach ($tags as $tag) {

                $tag = trim($tag);
                $tag_url = Str::slug($tag);


                $tag_ref = $this->model->where('tag_url', $tag_url)->first();

                if(is_null($tag_ref))
                {
                    $tag_ref = new $this->model([
                        'tag' => $tag,
                        'tag_url' => $tag_url
                    ]);
                    $post->tags()->save($tag_ref);
                } else {
                    $post->tags()->attach($tag_ref->id);
                }
            }
        }

    }

    private function detachTagsOnPost($post)
    {
        foreach ($post->tags as $tag)
        {
            $post->tags()->detach();
            $nbrAttached = DB::table('posts')->select(DB::raw('count(tags.id) as tag_attached_count'))
                ->join('post_tag','posts.id','=','post_tag.post_id')
                ->join('tags','post_tag.tag_id','=','tags.id')
                ->where('tags.id',$tag->id )->first();


            if($nbrAttached->tag_attached_count == 0)
            {
                $tag->delete();
            }
        }
    }

    public function storeTagsOnPost($post, $tags)
    {
       $this->attachTagsOnPost($post,$tags);
    }

    public function updateTagsOnPost($post,$tags)
    {

        //detach all tags from the post and delete tags, which are not attached
        $this->detachTagsOnPost($post);

        //attach tags to the post
        $this->attachTagsOnPost($post,$tags);

    }

    public function deleteTagsOnPost($post){
        $this->detachTagsOnPost($post);
    }


}