<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ListUser extends Component
{
    public $users = [];
    protected $listeners = ['userCreated' => 'listUsers'];

    public function mount()
    {
        $this->listUsers();
    }
    
    public function listUsers()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view(
            'livewire.list-user',
            ['users' => $this->users]
        );
    }
}
