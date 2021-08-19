<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nama;
    public $npm;
    public $password;
    public $password_confirmation;
    public $image;

    public function store()
    {
        $this->validate([
            'nama'      => 'required',
            'npm'       => 'required|unique:Users',
            'password'  => 'required|confirmed'
        ]);

        $this->image->store('public/avatar');

        $user = User::create([
            'nama'      => $this->nama,
            'npm'       => $this->npm,
            'password'  => bcrypt($this->password),
            'image'     => $this->image->hashName()
        ]);

        if($user) {
            session()->flash('success', 'Data saved successfully.');
            return redirect()->route('console.users.index');
        } else {
            session()->flash('error', 'Data failed to save.');
            return redirect()->route('console.users.index');
        }
    }

    public function render()
    {
        return view('livewire.console.users.create');
    }
}
