<?php

namespace App\Http\Livewire\Console\Videos;

use App\Video;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    public $search;

    protected $updateQueryString = ['search'];

    public function destroy($id)
    {
        $video = Video::find($id);
        if($video){
            Storage::disk('public')->delete('videos/'.$video->image);
            $video->delete();

            session()->flash('success', 'Data deleted successfully.');
            return redirect()->route('console.videos.index');
        } else {
            session()->flash('error', 'Data failed to deleted.');
            return redirect()->route('console.videos.index');
        }
    }

    public function render()
    {
        if($this->search != null){
            $videos = Video::where('title','like','%'.
            $this->search.'%')->latest()->paginate(5);
        } else {
            $videos = Video::latest()->paginate(5);
        }
        return view('livewire.console.videos.index', [
            'videos' => $videos
        ]);
    }
}
