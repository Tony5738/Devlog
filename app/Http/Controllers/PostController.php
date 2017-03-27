<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Repositories\LinkRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class PostController extends Controller
{

    protected $postRepository;
    protected $linkRepository;
    protected $tagRepository;

    protected $nbrPerPage = 10;


    public function __construct(PostRepository $postRepository,
                                LinkRepository $linkRepository,
                                TagRepository $tagRepository)
    {
        $this->middleware('auth',['except' => ['index','indexTag','show']]);
        $this->middleware('admin',['only' => ['destroy','store','edit','update']]);

        $this->postRepository = $postRepository;
        $this->linkRepository = $linkRepository;
        $this->tagRepository = $tagRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = $this->postRepository->getPostsWithUserAndTagsPaginate($this->nbrPerPage);
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
        //todo request
        $inputs = array_merge(
            $request->except('image_title', 'image','link_title','link_url','doc_name','doc','video_title','video'),
            ['user_id'=>$request->user()->id]
        );

        $post = $this->postRepository->store($inputs);
        if(isset($inputs['tags']))
        {
            $this->tagRepository->storeTagsOnPost($post,$inputs['tags']);
        }

        if($request->has('image') && $request->has('image_title'))
        {

        }

        if($request->has('link_title') && $request->has('link_url'))
        {
            $this->linkRepository->store(array_merge($request->get('link_title'),$request->get('link_url')));
        }

        if($request->has('doc_name') && $request->has('doc'))
        {

        }

        if($request->has('video_title') && $request->has('video'))
        {

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
        $post = $this->postRepository->getPostByIdWithUserAndTags($id);

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
        $post = $this->postRepository->getPostByIdWithUserAndTags($id);

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
        $inputs = $request->except('tags');
        $this->postRepository->update($post->id ,$inputs);
        if($request->has('tags'))
        {
            $this->tagRepository->updateTagsOnPost($post,$request->get('tags'));
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
        $this->postRepository->destroy($id);
        return redirect()->back()->with('message','Post deleted');
    }

    public function indexTag($tag)
    {
        $posts = $this->postRepository->getPostsWithUserAndTagsForTagPaginate($tag, $this->nbrPerPage);
        $links = $posts->render();

        return view('posts.list', compact('posts', 'links'))
            ->with('info', 'Results for tag : '  . $tag);

    }
}
