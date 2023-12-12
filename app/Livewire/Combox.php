<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Combox extends Component
{

    public $expanded = false;
    public $content = '';

    public function render()
    {
        return view('livewire.combox');
    }
    public function expand()
    {
        $this->expanded = true;
    }

    public function collapse()
    {
        $this->expanded = false;
        $this->content = ''; // Reset the text when collapsing
    }

    public function save()
    {
        if (((0<Str::length(this->$content)))&&((181>Str::length(this->$content)))){
            redirect()->route('posts.index');
        } else {
            
        }
    }
    
    

}
