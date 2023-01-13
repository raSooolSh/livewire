<div wire:ignore.self class="modal fade" id="task_edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submit" action="">

                    <div class="mb-3">
                        <label for="email" class="mb-2">Title :</label>

                        <input wire:model.defer="title" type="text" name="title"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('title')
                            <p class="badge text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="mb-2">Content :</label>
                        <textarea wire:model.defer="content" id="content" rows="3" name="content"
                            class="form-control @error('content') is-invalid @enderror"> </textarea>
                        @error('content')
                            <p class="badge text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="mb-2">Status :</label>
                        <select wire:model.defer="status" class="form-control @error('status') is-invalid @enderror"
                            name="status" id="status">
                            <option value="pending" selected>Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                        @error('status')
                            <p class="badge text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-secondary">Create
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
    </div>
</div>
