<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationForm extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $profilePic;
    
    public function createUser(){
        sleep(2);
        $this->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:10',
            'profilePic' => 'required|image|max:1024'
        ]);


        $imagePath = $this->profilePic->store('profilePicture', 'public');

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'image' => $imagePath,
        ]);
        $this->emit('userCreated');

        $this->reset(['name', 'email', 'password', 'profilePic']);
        session()->flash('message', 'Your account has been created successfully');
    }
    public function render()
    {
        return view('livewire.registration-form');
    }
}
