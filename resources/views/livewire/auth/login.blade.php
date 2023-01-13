<div class="p-3">
    <h4 class="text-muted text-center my-3">Login</h4>
    <form wire:submit.prevent="login" action="">
        
        <div class="mb-3">
            <label for="email" class="mb-2">Email</label>

            <input wire:model.lazy="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <p class="badge text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="mb-2">Password</label>
            <input wire:model.lazy="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <p class="badge text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-check mb-3">
            <input wire:model.lazy="remember" type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Remember me</label>
        </div>
        <button type="submit" class="btn btn-secondary">Login
            <div wire:loading wire:target="Login">
                <div class="spinner-border spinner-border-sm"></div>
            </div>
        </button>
        @if (session()->has('error'))
            <span class="badge text-danger">
                {{ session()->get('error') }}
            </span>
        @endif
        <div class="d-flex justify-content-center">
            <p wire:click="$emitUp('isRegisterForm',true)" style="Cursor : pointer"
                class="text-decoration-underline text-primary">I haven't account.</p>
        </div>
    </form>
</div>
