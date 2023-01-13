<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <h4>Create Product</h4>

        <form wire:submit.prevent="submit" action="">

            <div class="mb-3">
                <label for="title" class="mb-2">Title :</label>

                <input wire:model.defer="title" type="text" name="title"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <p class="badge text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="mb-2">discription :</label>
                <textarea wire:model.defer="description" id="description" rows="3" name="description"
                    class="form-control @error('description') is-invalid @enderror"> </textarea>
                @error('description')
                    <p class="badge text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label  for="price" class="mb-2">Price :</label>
                <input wire:model.defer="price" class="form-control  @error('price') is-invalid @enderror" type="text" name="price"
                    id="price">
                @error('price')
                    <p class="badge text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input wire:model="image" class="form-control  @error('image') is-invalid @enderror" type="file"
                    name="image" id="image">
                @error('image')
                    <p class="badge text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div wire:loading wire:target="image">
                Uploding ...
            </div>

            @if ($image)
                <div>
                    Preview Image :
                    <img width="200" src="{{ $image->temporaryUrl() }}" alt="temporary">
                </div>
            @endif
            <button wire:loading.attr="disabled" wire:target="image" type="submit" class="btn btn-secondary">Create
                <div wire:loading wire:target="submit">
                    <div class="spinner-border spinner-border-sm"></div>
                </div>
            </button>
            @if (session()->has('error'))
                <span class="badge text-danger">
                    {{ session()->get('error') }}
                </span>
            @endif
        </form>
    </div>
</div>
