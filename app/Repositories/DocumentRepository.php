<?php

namespace App\Repositories;


use App\Document;
use Illuminate\Support\Facades\Storage;

class DocumentRepository extends ResourceRepository
{


    public function __construct(Document $document)
    {
        $this->model = $document;
    }

    public function store(Array $inputs)
    {
        $file = $inputs['document'];
        $filename = $file->getClientOriginalName();
        $extension = $file -> getClientOriginalExtension();
        $doc = sha1($filename . time()) . '.' . $extension;

        $document = new Document();
        $document ->document_title = $inputs['document_title'];
        $document ->document = $doc;
        $document->post_id =  $inputs['post_id'];
        $document->save();

        //store the picture
        $file->storeAs('documents',$doc);
    }


    public function destroyDocumentOnPost($post){
        $doc = $post->document;
        Storage::delete('\documents\\'.$doc->document);
        $doc->delete();
    }

    public function updateDocumentOnPost($post, Array $inputs){

        if($post->document != null)
        {
            $this->destroyDocumentOnPost($post);
            $this->store($inputs);
        }
        else{

            $this->store($inputs);
        }

    }

}