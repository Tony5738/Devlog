<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title', 'post_content', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function link()
    {
        return $this->hasOne('App\Link');
    }

    public function video()
    {
        return $this->hasOne('App\Video');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function document()
    {
        return $this->hasOne('App\Document');
    }
}
