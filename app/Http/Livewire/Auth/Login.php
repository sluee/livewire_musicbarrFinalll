<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $errorMsg;

    public function submit(){
        $this->validate([
            'email'     => 'required|string',
            'password'  =>  'required|string'
        ]);


        $user = User::where('email', $this->email)->first();
        $username = $user ? $user->username : '';

        if(!$user){
            $this->errorMsg = 'Sorry your account does not exists.';
            $this->email = '';
            $this->password = '';
        }else {
            $login = auth()->attempt([
                'email'     =>$this->email,
                'password'  =>$this->password
            ]);

            if(!$login){
                $this->errorMsg = 'Invalid Credentials';
                $this->email = '';
                $this->password = '';
            }else{
                session()->flash("message", "Hello, ".$username);
                return redirect('/band');
            }
        }
    }
    public function render()
    {
        return view('livewire..auth.login');
    }
}
