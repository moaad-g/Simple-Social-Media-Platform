<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tag;
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
        $post_list = Post::orderBy('updated_at' , 'desc')->paginate(9);
        return view('posts.postlist', ['post_list' =>$post_list, 'title'=>'All Posts']);
    }

    public function tagindex(string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        $post_list = $tag->posts()->paginate(9);
        return view('posts.postlist', ['post_list' =>$post_list, 'title'=>('Posts tagged with: #'.$tag->name)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tag_list = Tag::all();
        if (Auth::check()){
            return view('posts.create' , ['tag_list'=>$tag_list]);
        } else {
            session()->flash('message', 'You Must Be Logged In To Post.');
            return redirect()->route('posts.index');

        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'content' => 'required|max:280',
            'image'=> 'nullable|mimes:png,jpg,jpeg|max:6000'
        ]);
        $user_id = Auth::id();
        $new_post = Post::create([
            'content' => $request->content,
            'user_id' => $user_id,
            'image_path' => ''
        ]);

        if ($request->image){
            $image_file_name = $new_post->id.'-'.'image'.'.'.$request->image->extension();
            $move = $request->image->move(public_path('images'),$image_file_name);
            $new_post->image_path = $image_file_name;
            $new_post->save();
        }
        if ($request->tag_list){
            foreach ($request->tag_list as $tag){
                $new_post->tags()->attach($tag);
            }
        }
        session()->flash('message', 'post successful.');
        return redirect()->route('posts.show', ['id'=>$new_post->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        if (Auth::check()){
            $user_id = Auth::id();
            $current_user = User::findOrFail($user_id);
            if ($current_user->is_admin == "no"){
                $is_admin = FALSE;
            }else {
                $is_admin = TRUE;
            }
        } else {
            $is_admin = FALSE;
            
        }

        $post = Post::findOrFail($id);
        $comment_list = $post->comments()->get();
        return view('posts.show', ['post' =>$post , 'comment_list'=>$comment_list , 'is_admin'=>$is_admin ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'content' => 'required|max:280',
        ]);
        $post = Post::findOrFail($id);
        $post->content = $request->content;
        $post->save();
        return redirect()->route('posts.show', ['id'=>$id]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        if ($post->image_path != ''){
            File::delete(public_path("images/".$post->image_path));
        }
        $post->comments()->delete();
        $post->delete();
        
        return redirect()->route('posts.index')->with('message','post deleted');
    }

    public function destroycomm(string $id , string $comm_id)
    {
        //
        $comment = Comment::findOrFail($comm_id);
        $comment->delete();
        
        return redirect()->route('posts.show', ['id'=>$id])->with('message','comment deleted');
    }
}
