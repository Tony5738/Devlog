<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_title'=>'required|max:80',
            'post_content' => 'required',
            'tags' => ['Regex:/^[A-Za-z0-9]{1,50}?(,[A-Za-z0-9]{1,50})*$/'],
            'link_title' => 'max:80',
            'link_url' => 'url|unique:links',
            'image_title' => 'max:80',
            'image' =>'mimes:jpeg,jpg,png',
            'document_title' => 'max:80',
            'document' => 'mimes:pdf',
            'video_title'=>'max:80',
            'video' => 'mimes:mp4',



        ];
    }



}
