<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Clicker extends Component
{
    public function handleCreateUser(){
        User::create([
            'name' => 'Xamuel Oyeniran',
            'email' => 'oyeniran.sam@gmail.com',
            'password' => Hash::make('11111111')
        ]);
    }

    public function render()
    {
        $users = User::all();
        return view(
            'livewire.clicker',
            ['users' => $users]
        );
    }
}
