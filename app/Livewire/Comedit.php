<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Comedit extends Component
{
    public $comment;
    public $expanded_edit = false;
    public $invalid = false;  
    public $content = '';

    public function render()
    {
        return view('livewire.comedit');
    }

    public function expand_edit()
    {
        $this->expanded_edit = true;
        $this->content = $this->comment->content;
    }

    public function collapse_edit()
    {
        $this->expanded_edit = false;
        $this->invalid = false;
        $this->content = '';
    }
    public function save_edit()
    {
        if (((0<Str::length($this->content)))&&((181>Str::length($this->content)))){
            $this->expanded_edit = false;
            $this->comment->content = $this->content;
            $this->comment->save();
            $this->content = '';
            return redirect()->route('posts.show', ['id'=>$this->comment->post_id]);
        } else {       
            $this->invalid = true;  
        }

    }
}
