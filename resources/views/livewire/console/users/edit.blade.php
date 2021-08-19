<div>
    {{-- Stop trying to control. --}}
    <div class="mt-3">
        <div class="card border-0 rounded-lg shadow-sm">
            <div class="card-header">
                <i class="fas fa-users"></i> EDIT USER
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="userId">
                    <div class="row">
                        <div class="col-md-12">
                            @if($image)
                            <div class="text-center">
                                <img src="{{ $image->temporaryUrl() }}" alt="" style="height: 150px; width: 150px; object-fit:cover"
                                class="immg-thumbnail">
                                <p>PREVIEW</p>
                            </div>
                            @else
                            <div class="text-center">
                                <img src="{{ asset('images/image.png') }}" alt="" style="height: 150px; width: 150px; object-fit:cover"
                                class="immg-thumbnail">
                                <p>PREVIEW</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" id="image" class="form-control" wire:mmodel="image">
                    </div>
                    <input type="hidden" wire:mmodel="userId">
                    <div class="form-group">
                        <label>NAMA LENGKAP</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model.lazy="nama" placeholder="Masukan nama lengkap">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>NPM</label>
                        <input type="number" class="form-control @error('npm') is-invalid @enderror" wire:model.lazy="npm" placeholder="Masukan NPM">
                        @error('npm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="password" class="form-control" wire:model.lazy="password" placeholder="Masukan password">
                    </div>
                    <button type="submit" class="btn btn-dark shadow">UPDATE</button>
                    <button type="reset" class="btn btn-warning shadow">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
