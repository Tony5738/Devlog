<?php

namespace App\Http\Controllers;

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
    public function store(Request $request, TagRepository $tagRepository)
    {
        $inputs = array_merge($request->all(),['user_id'=>$request->user()->id]);
        $post = $this->postRepository->store($inputs);
        if(isset($inputs['tags']))
        {
            $tagRepository->storeOnPost($post,$inputs['tags']);
        }
        return redirect(route('post.index'));
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
        $post = $this->postRepository->getPostByIdWithUserAndTags($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->destroy($id);
        return redirect()->back();
    }

    public function indexTag($tag)
    {
        $posts = $this->postRepository->getPostsWithUserAndTagsForTagPaginate($tag, $this->nbrPerPage);
        $links = $posts->render();

        return view('posts.list', compact('posts', 'links'))
            ->with('info', 'Results for tag : '  . $tag);

    }
}
