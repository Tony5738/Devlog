<?php

namespace App\Repositories;

use App\Video;
use Illuminate\Support\Facades\Storage;

class VideoRepository extends ResourceRepository
{


    public function __construct(Video $video)
    {
        $this->model = $video;
    }

    public function store(Array $inputs)
    {
        $file = $inputs['video'];
        $filename = $file->getClientOriginalName();
        $extension = $file -> getClientOriginalExtension();
        $film = sha1($filename . time()) . '.' . $extension;

        $video = new Video();
        $video ->video_title = $inputs['video_title'];
        $video ->video = $film;
        $video->post_id =  $inputs['post_id'];
        $video->save();

        //store the picture
        $file->storeAs('videos',$film);
    }

    public function destroyVideoOnPost($post){
        $video = $post->video;
        Storage::delete('\videos\\'.$video->video);
        $video->delete();
    }

    public function updateVideoOnPost($post, Array $inputs)
    {
        if($post->video != null)
        {
            $this->destroyVideoOnPost($post);
            $this->store($inputs);

        }
        else{
            $this->store($inputs);
        }
    }

}
