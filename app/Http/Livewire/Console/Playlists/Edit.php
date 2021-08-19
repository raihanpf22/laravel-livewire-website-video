<?php

namespace App\Http\Livewire\Console\Playlists;

use Livewire\Component;
use App\Playlist;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $playlistId;
    public $title;

    public function mount($id)
    {
        $playlist = Playlist::find($id);
        if($playlist) {
            $this->playlistId   = $playlist->id;
            $this->title        = $playlist->title;
        }
    }
    public function update()
    {
        $this->validate([
            'title' => 'required'
        ]);
        if($this->playlistId) {
            $playlist = Playlist::find($this->playlistId);
            if($playlist) {
                $playlist->update([
                    'title' => $this->title,
                    'slug'  => Str::slug($this->title, '-')
                ]);
                session()->flash('success', 'Data updated successfully.');
                return redirect()->route('console.playlists.index');
            }
        }
    }
    public function render()
    {
        return view('livewire.console.playlists.edit');
    }
}
