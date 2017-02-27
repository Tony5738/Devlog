<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostController extends Controller
{

    protected $postRepository;

    protected $nbrPerPage = 10;


    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth',['except' => ['index','indexTag','show']]);
        $this->middleware('admin',['only' => ['destroy','store','edit','update']]);

        $this->postRepository = $postRepository;
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
     * @param  \Illuminate\Http\Request $request
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, TagRepository $tagRepository)
    {
        $inputs = array_merge($request->all(),['user_id'=>$request->user()->id]);
        $post = $this->postRepository->store($inputs);
        if(isset($inputs['tags']))
        {
            $tagRepository->storeTagsOnPost($post,$inputs['tags']);
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
     * @param TagRepository $tagRepository
     * @param $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(PostRequest $request, TagRepository $tagRepository, Post $post)
    {
        //todo policy can't update if you are not the owner
        $inputs = array_merge($request->all());
        $this->postRepository->update($post->id ,$inputs);
        if(isset($inputs['tags']))
        {
            $tagRepository->updateTagsOnPost($post,$inputs['tags']);
        }
        return redirect(route('post.index'))->with('message','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TagRepository $tagRepository
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagRepository $tagRepository,$id)
    {
        //todo policy can't delete if you are not the owner
        $post =  $this->postRepository->getById($id);
        if(!$post->tags()->get()->isEmpty())
        {
            $tagRepository->deleteTagsOnPost($post);
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
