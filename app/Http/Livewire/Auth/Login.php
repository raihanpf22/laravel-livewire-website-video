<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    /** 
    * public variable
    */
    public $npm;
    public $password;

    /**
     * login function
     */
    public function login()
    {
        $this->validate([
            'npm'       => 'required',
            'password'  =>  'required'
        ]);
        if(Auth::attempt(['npm'=>$this->npm,'password'=>$this->password])) {
            session()->flash('success', 'Login successfully.');
            return redirect()->route('console.dashboard.index');
        } else {
            session()->flash('error', 'Your NPM or Password is incorrect.');
            return redirect()->route('auth.login');
        }
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
