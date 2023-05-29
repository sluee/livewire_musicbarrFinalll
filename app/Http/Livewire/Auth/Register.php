<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $name, $username, $email, $location, $password, $password_confirmation;

    public function submit(){
        $this->validate([
            'name'              =>'required|string',
            'username'          =>'required|string',
            'location'          =>'required|string',
            'email'             =>'required|email|unique:users',
            'password'          =>'required|confirmed|string|min:6'
        ]);

        User::create([
            'name'              =>$this->name,
            'username'          =>$this->username,
            'location'          =>$this->location,
            'email'             =>$this->email,
            'password'          =>bcrypt($this->password)
        ]);
        session()->flash('success', 'Account Created Successfully ');
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire..auth.register');
    }
}
