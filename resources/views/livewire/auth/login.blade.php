<div>
    {{-- The whole world belongs to you --}}
    <div class="container" style="margin-top: 80px">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-mamen.png') }}" style="width: 200px">
                </a>
            </div>
        <div class="card border-0 shadow-sm rounded-lg mt-5">
            <div class="card-body">
                <form wire:submit.prevent="login">
                    <div class="form-group">
                        <label>NPM</label>
                        <input type="text" wire:model="npm" class="form-control @error('npm') is-invalid @enderror" placeholder="Masukan NPM">
                        @error('npm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror   
                    </div>
            
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary shadow">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
