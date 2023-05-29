<?php

namespace App\Http\Livewire\Profile;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads ;
    public $name, $location, $description, $profile_pic, $user_edit_id;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->location = $user->location;
        $this->description = $user->description;

    }

    public function submit()
    {
        $user = auth()->user();

        $this->validate([
            'name' => 'required',
            'location' => 'required',
            // 'description' => 'required',
            'profile_pic' => 'nullable|image',
        ]);

        $user->name = $this->name;
        $user->location = $this->location;
        $user->description = $this->description;

        if ($this->profile_pic) {
            $imageName = Carbon::now()->timestamp . '.' . $this->profile_pic->extension();
            $this->profile_pic->storeAs('bandImgs', $imageName, 'public');
            $user->profile_pic = $imageName;
        }

        $user->save();

        session()->flash('message', 'Profile updated successfully.');

        return redirect('/profile');
    }
    public function render()
    {
        return view('livewire..profile.index');
    }
}
