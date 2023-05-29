<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AccountSettings extends Component
{
    public $username, $old_pass, $password, $password_confirmation;

    public function mount(){
        $user = auth()->user();
        $this->username = $user->username;
    }

    public function submit(){
        $user = auth()->user();

        $this->validate([
            'old_pass' => [
                'nullable',
                'required_with:password',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail(__('The current password is incorrect.'));
                    }
                },
            ],
            'password' => 'required|confirmed|string',

        ]);

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $user = auth()->user();

        $user->password = bcrypt($this->password);

        $user->save();


        session()->flash('message', 'Password updated successfully.');

        return redirect('/settings');

    }

    public function editUsername(){
        $user = auth()->user();

        $this->validate([
            'username' => 'required',
        ]);

        $user->username = $this->username;

        $user->save();

        session()->flash('message', 'Username updated successfully.');

        return redirect('/settings');
    }

    public function deleteUser(){
        $user = auth()->user();

        $user->delete();

        session()->flash('message', 'User deleted successfully.');

        return redirect('/login');
    }
    public function render()
    {
        return view('livewire..profile.account-settings');
    }
}
