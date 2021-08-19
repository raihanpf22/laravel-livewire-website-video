<?php

namespace App\Http\Livewire\Console\Playlists;

use Livewire\Component;
use App\Playlist;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    protected $upateQueryString = ['search'];

    public function destroy($id)
    {
        $playlist = Playlist::find($id);

        if($playlist) {
            $playlist->delete();
            session()->flash('success', 'Data deleted successfully.');
            return redirect()->route('console.playlists.index');
        } else {
            session()->flash('error', 'Data failed to delete.');
            return redirect()->route('console.playlists.index');
        }
    }
    public function render()
    {
        if($this->search != null) {
            $playlists = Playlist::where('title', 'like', '%' .$this->search. '%')->latest()->paginate(10);
        } else {
            $playlists = Playlist::latest()->paginate(10);
        }
        return view('livewire.console.playlists.index', [
            'playlists' => $playlists
        ]);
    }
}
