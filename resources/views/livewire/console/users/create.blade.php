<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="mt-3">
        <div class="card border-0 rounded-lg shadow-sm">
            <div class="card-header">
                <i class="fas fa-users"></i> ADD USER
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-md-12">
                            @if($image)
                            <div class="text-center">
                                <img src="{{ $image->temporaryUrl() }}" alt="" style="height: 150px; width: 150px; object-fit:cover" class="img-thumbnail">
                                <p>PREVIEW</p>
                            </div>
                            @else
                            <div class="text-center">
                                <img src="{{ asset('images/image.png') }}" alt="" style="height: 150px; width: 150px; object-fit:cover" class="img-thumbnail">
                                <p>PREVIEW</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" id="image" class="form-control" wire:model="image" required>
                        @error('image')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
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
                        <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.lazy="password" placeholder="masukan Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>PASSWORD CONFIRMATION</label>    
                        <input type="password" class="form-control" wire:model.lazy="password_confirmation" placeholder="Konfirmasi Password">
                    </div>
                    <button type="submit" class="btn btn-dark shadow">SAVE</button>
                    <button type="reset" class="btn btn-warning shadow">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
