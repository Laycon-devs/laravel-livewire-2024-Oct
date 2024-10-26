<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;
    
    public $name;
    public $email;
    public $password;

    public function handleCreateUser(){
        $this->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:10'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        session()->flash('message', 'User account created successfully......');
        $this->reset(['name', 'email', 'password']);

    }

    public function render()
    {
        $users = User::paginate(5);
        return view(
            'livewire.clicker',
            ['users' => $users]
        );
    }
}
