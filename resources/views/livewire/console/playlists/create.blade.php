<div>
    {{-- In work, do what you enjoy. --}}
    <div class="mt-3">
        <div class="card border-0 rounded-lg shadow-sm">
            <div class="card-header">
                <i  class="fas fa-list-ul"></i> ADD PLAYLIST
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label>TITLE</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title" placeholder="Masukan nama playlist">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-dark shadow">SAVE</button>
                    <button type="submit" class="btn btn-warning shadow">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
