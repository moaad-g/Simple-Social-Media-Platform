<?php

namespace App\Livewire;

use Livewire\Component;

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
        $this->text = ''; // Reset the text when collapsing
    }
    

}
