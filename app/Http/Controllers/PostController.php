<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(5); //convert result list to pagination
        return view ('posts.index', compact('posts'));
    }

    public function search(Request $request)
    {
        if($request->search == "" || $request->search == null)
        {
            header("Locatoin: posts");
        } else {
            $posts = Post::where('name', 'LIKE', '%'.$request->search.'%')->paginate(5);
            $posts->appends($request->only('search'));
            return view('posts.index', compact('posts'));
        }


        $posts = Post::paginate(5); //convert result list to pagination
        return view ('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:posts,email',
            'number' => 'required|numeric'
        ]);

        if($validator->fails()) 
        {
            $errors = $validator->errors()->all();
            return back()->with('errors', $errors)->withInput();
        } 

        $posts = new Post();

        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $filename);
            $posts->filename=$filename;
        }

        $posts->id = $request->get('uid');
        $posts->name = $request->get('name');
        $posts->email = $request->get('email');
        $posts->number = $request->get('number');
        $posts->content = $request->get('content');
        $posts->save();

        return redirect('posts')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //view detailed/specific output
        $posts = Post::find($id);
        $imageurl = asset('images/'.$posts->filename);

        return view('posts.view', compact('posts', 'id', 'imageurl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function edit(Post $post)
    public function edit($id)
    {
        //open edit file. 

        $posts = Post::find($id);
        return view('posts.edit', compact('posts', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update data
        $posts=Post::find($id); //find post primary key

        $oldMail = $request->get('oldMail');
        $newMail = $request->get('email');
        if($oldMail != $newMail) {
            $validator = \Validator::make($request->all(), [
                'email' => 'required|unique:posts,email',
            ]);

            if($validator->fails()) 
            {
                $errors = $validator->errors()->all();
                return back()->with('errors', $errors)->withInput();
            }
        }

        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $filename);
            $posts->filename=$filename;

            // $file = $request->file('filename')->store('images');
            // $file = $request->Storage::disk('public')->put('filename');
            // $posts->filename=$file;

        }

        $posts->name = $request->get('name');
        $posts->email = $request->get('email');
        $posts->number = $request->get('number');
        $posts->content = $request->get('content');
        $posts->save();
        return redirect('posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete data
        $posts=Post::find($id);
        $posts->delete();
        return redirect('posts')->with('success', 'Post has been deleted');
    }

    /**
     * Display a listing of the resource based on Search Results
     *
     * @return \Illuminate\Http\Response
     */
}
