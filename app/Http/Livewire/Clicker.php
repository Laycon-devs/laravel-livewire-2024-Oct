<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Clicker extends Component
{
    public $count = 0;

    public function handleIncre()
    {
        $this->count++;
    }
    
    public function handleDecre()
    {
        $this->count--;
    }
    public function handleReset()
    {
        $this->count = 0;
    }
    
    public function render()
    {
        return view('livewire.clicker');
    }
}
