<?php

namespace App\Repositories;


use App\Image;
use Illuminate\Support\Facades\Storage;

class ImageRepository extends ResourceRepository
{
    public function __construct(Image $image)
    {
        $this->model = $image;
    }


    public function store(Array $inputs)
    {
        $file = $inputs['image'];
        $filename = $file->getClientOriginalName();
        $extension = $file -> getClientOriginalExtension();
        $picture = sha1($filename . time()) . '.' . $extension;


        $image = new Image();
        $image ->image_title = $inputs['image_title'];
        $image ->image = $picture;
        $image->post_id =  $inputs['post_id'];
        $image->save();

        //store the picture
        $file->storeAs('images',$picture);

    }

    public function destroyImageOnPost($post){
        $image = $post->image;
        Storage::delete('\images\\'.$image->image);
        $image->delete();
    }

    public function updateImageOnPost($post, Array $inputs){

        if($post->image != null)
        {
            $this->destroyImageOnPost($post);
            $this->store($inputs);
        }
        else{
            $this->store($inputs);
        }
    }


}