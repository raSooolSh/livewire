<div class="p-3">
    <h4 class="text-muted text-center my-3">Register</h4>
    <form wire:submit.prevent="register" action="">

        <div class="mb-3">
            <label for="email" class="mb-2">Email</label>
            <input wire:model.lazy="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <p class="badge text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="mb-2">Name</label>
            <input wire:model.lazy="name" type="text" name="name"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
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
        <div class="mb-3">
            <label for="password_confrimation" class="mb-2">Password confirmation</label>
            <input wire:model.lazy="password_confrimation" type="password" name="password_confrimation"
                class="form-control @error('password_confrimation') is-invalid @enderror">
            @error('password_confrimation')
                <p class="badge text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-secondary {{ $canBeSubmited ? '' : 'disabled' }}">Register
            <div wire:loading wire:target="register">
                <div class="spinner-border spinner-border-sm"></div>
            </div>
        </button>
        <div class="d-flex justify-content-center">
            <p wire:click="$emitUp('isRegisterForm',false)" style="Cursor : pointer" class="text-decoration-underline text-primary">I have accuont.</p>
        </div>
    </form>
</div>
