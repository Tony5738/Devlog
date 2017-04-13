<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Image;
use App\Post;
use App\Repositories\DocumentRepository;
use App\Repositories\ImageRepository;
use App\Repositories\LinkRepository;
use App\Repositories\TagRepository;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class PostController extends Controller
{

    protected $postRepository;
    protected $linkRepository;
    protected $imageRepository;
    protected $documentRepository;
    protected $videoRepository;
    protected $tagRepository;


    protected $nbrPerPage = 10;


    public function __construct(PostRepository $postRepository,
                                LinkRepository $linkRepository,
                                TagRepository $tagRepository,
                                ImageRepository $imageRepository,
                                DocumentRepository $documentRepository,
                                VideoRepository $videoRepository)
    {

        $this->middleware('auth',['except' => ['index','indexTag','show']]);
        $this->middleware('admin',['only' => ['create','store','destroy','store','edit','update']]);

        $this->postRepository = $postRepository;
        $this->linkRepository = $linkRepository;
        $this->tagRepository = $tagRepository;
        $this->imageRepository = $imageRepository;
        $this->documentRepository = $documentRepository;
        $this->videoRepository = $videoRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = $this->postRepository->getPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideoPaginate($this->nbrPerPage);
        $links = $posts->render();

        return view('posts.list',compact('posts','links'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param TagRepository $tagRepository
     */
    public function store(PostRequest $request)
    {

        $inputs = array_merge($request->all(),['user_id'=>$request->user()->id]);

        $post = $this->postRepository->store($inputs);

        if(isset($inputs['tags']))
        {
            $this->tagRepository->storeTagsOnPost($post,$inputs['tags']);
        }


        if(isset($inputs['image_title']) && $inputs['image_title']!= null && isset($inputs['image']))
        {
            $this->imageRepository->store(array_merge($request->only('image_title','image'),['post_id'=>$post->id]));
        }

        if(isset($inputs['link_title']) && $inputs['link_title']!= null && isset($inputs['link_url']) && $inputs['link_url']!= null)
        {
            $this->linkRepository->store(array_merge($request->only('link_title','link_url'),['post_id'=>$post->id]));
        }

        if(isset($inputs['document_title']) && $inputs['document_title']!= null && isset($inputs['document']))
        {
            $this->documentRepository->store(array_merge($request->only('document_title','document'),['post_id' => $post->id]));
        }

        if(isset($inputs['video_title']) && $inputs['video_title']!= null && isset($inputs['video']))
        {
            $this->videoRepository->store(array_merge($request->only('video_title','video'),['post_id' => $post->id]));
        }


        return redirect(route('post.index'))->with('message','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepository->getPostByIdWithUserAndTagsAndLinkAndDocumentAndImageAndVideo($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //todo policy can't edit if you are not the owner
        $post = $this->postRepository->getPostByIdWithUserAndTagsAndLinkAndDocumentAndImageAndVideo($id);

        if(!$post->tags()->get()->isEmpty())
        {
            $tagString = $post->tags->first()->tag;
            for ($i = 1;$i<$post->tags->count();$i++){
                $tagString .= ','.$post->tags[$i]->tag;
            }
        }
        return view('posts.edit', compact('post','tagString'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest|Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param TagRepository $tagRepository
     * @internal param int $id
     */
    public function update(PostRequest $request,  Post $post)
    {

        //todo policy can't update if you are not the owner
        $inputs = $request->all();
        $this->postRepository->update($post->id ,$inputs);
        if(isset($inputs['tags']))
        {
            $this->tagRepository->updateTagsOnPost($post,$request->get('tags'));
        }

        if(isset($inputs['image_title']) && $inputs['image_title']!= null && isset($inputs['image']))
        {
            $this->imageRepository->updateImageOnPost($post,array_merge($request->only('image_title','image'),['post_id'=>$post->id]));
        }

        if(isset($inputs['link_title']) && $inputs['link_title']!= null && isset($inputs['link_url']) && $inputs['link_url']!= null)
        {
            $this->linkRepository->updateLinkOnPost($post,array_merge($request->only('link_title','link_url'),['post_id'=>$post->id]));
        }

        if(isset($inputs['document_title']) && $inputs['document_title']!= null && isset($inputs['document']))
        {
            $this->documentRepository->updateDocumentOnPost($post,array_merge($request->only('document_title','document'),['post_id' => $post->id]));
        }

        if(isset($inputs['video_title']) && $inputs['video_title']!= null && isset($inputs['video']))
        {
            $this->videoRepository->updateVideoOnPost($post,array_merge($request->only('video_title','video'),['post_id' => $post->id]));
        }

        return redirect(route('post.index'))->with('message','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param TagRepository $tagRepository
     */
    public function destroy($id)
    {
        //todo policy can't delete if you are not the owner
        $post =  $this->postRepository->getById($id);
        if(!$post->tags()->get()->isEmpty())
        {
            $this->tagRepository->deleteTagsOnPost($post);
        }

        if($post->link != null)
        {
            $post->link->delete();
        }

        if($post->image != null)
        {
            $this->imageRepository->destroyImageOnPost($post);
        }

        if($post->video != null)
        {
            $this->videoRepository->destroyVideoOnPost($post);
        }

        if($post->document != null)
        {
            $this->documentRepository->destroyDocumentOnPost($post);
        }




        $this->postRepository->destroy($id);
        return redirect()->back()->with('message','Post deleted');
    }

    public function indexTag($tag)
    {
        $posts = $this->postRepository->getPostsWithUserAndTagsAndLinkAndDocumentAndImageAndVideoForTagPaginate($tag, $this->nbrPerPage);
        $links = $posts->render();

        return view('posts.list', compact('posts', 'links'))
            ->with('info', 'Results for tag : '  . $tag);

    }
}
