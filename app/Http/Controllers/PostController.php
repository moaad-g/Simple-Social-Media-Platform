<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post_list = Post::all();
        return view('posts.postlist', ['post_list' =>$post_list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::check()){
            return view('posts.create');
        } else {
            session()->flash('message', 'You Must Be Logged In To Do That.');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'content' => 'required|max:280',
        ]);
        $user_id = Auth::id();
        $new_post = Post::create([
            'content' => $request->content,
            'user_id' => $user_id,
        ]);

        session()->flash('message', 'post successful.');

        return redirect()->route('posts.show', ['id'=>$new_post->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $comment_list = DB::table('comments')->select('content')->where('post_id', $id)->orderBy('updated_at','desc')->get();
        return view('posts.show', ['post' =>$post , 'comment_list'=>$comment_list ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
