<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $userId;
    public $nama;
    public $npm;
    public $password;
    public $image;

    public function mount($id) 
    {
        $user = User::find($id);
        if($user) {
            $this->userId = $user->id;
            $this->nama   = $user->nama;
            $this->npm    = $user->npm;
        }
    }

    public function update()
    {
        $this->validate([
            'nama'  => 'required',
            'npm'   => 'required|unique:users,npm,'.$this->userId
        ]);
        if($this->userId) {
            $user = User::find($this->userId);
            if($user) {
                if($this->password == "") {
                    if($this->image == null ) {
                        $user->update([
                            'nama'  => $this->nama,
                            'npm'   => $this->npm
                        ]);
                    } else {
                        $this->image->store('public/avatar');
                        $user->update([
                            'nama'  => $this->nama,
                            'npm'   => $this->npm,
                            'image' => $this->image->hashName()
                        ]);
                    }
                } else {
                    if($this->image == null) {
                        $user->update([
                            'nama'      => $this->nama,
                            'npm'       => $this->npm,
                            'password'  => bcrypt($this->password)
                        ]);
                    } else {
                        $this->image->store('public/avatar');
                        $user->update([
                            'nama'      => $this->nama,
                            'npm'       => $this->npm,
                            'password'  => bcrypt($this->password),
                            'image'     => $this->image->hashName()
                        ]);
                    }
                }
                session()->flash('success', 'Data updated successfully.');
                return redirect()->route('console.users.index');
            }
        }
    }

    public function render()
    {
        return view('livewire.console.users.edit');
    }
}
