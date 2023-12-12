<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Comview extends Component
{
    public $post;
    public $comment_list;
    public $is_admin;
    public $expanded = false;
    public $content = '';

    public function render()
    {
        $this->comment_list = $this->post->comments()->get();
        return view('livewire.comview',['comment_list'=>$this->comment_list, $this->is_admin]);
    }

    public function expand()
    {
        $this->expanded = true;
    }

    public function collapse()
    {
        $this->expanded = false;
        $this->content = '';
    }

    public function save()
    {
        if (((0<Str::length($this->content)))&&((181>Str::length($this->content)))){
            $new_comment = Comment::create([
                'content' => $this->content,
                'user_id' => Auth::id(),
                'post_id' => $this->post->id
            ]);
            $this->comment_list->push($new_comment);
            $this->expanded = false;
            $this->content = '';
            return view('livewire.comview',['comment_list'=>$this->comment_list]);
        } else {
            
        }
    }
    
    
}
