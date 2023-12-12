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
        $this->edit_content = '';
    }
    public function save_edit()
    {
        $this->expanded_edit = false;
        $this->edit_content = '';
    }
}
