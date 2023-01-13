<div class="px-2">

    <form wire:submit.prevent="$refresh" class="row align-items-center mb-3 gx-3">

        <div class="col-auto">
            <label for="email">Title :</label>

            <input wire:model.defer="search" type="text" name="search"
                class="form-control form-control-sm @error('search') is-invalid @enderror">
            @error('search')
                <p class="badge text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-auto">
            <label for="status">Status :</label>
            <select wire:model.defer="status" class="form-control form-control-sm @error('status') is-invalid @enderror"
                name="status" id="status">
                <option value="" selected>All</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
            @error('status')
                <p class="badge text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-sm col-auto mt-4 btn-secondary">Filter
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

    <div wire:loading class="position-relative row justify-content-center" style="min-width: 50vw; min-height: 50vh;">
        <div class="spinner-border position-absolute top-50" style="right:50%"></div>
    </div>
    <div wire:loading.remove>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                    <tr>
                        <th scope="row">{{ $tasks->firstItem() + $index }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <div class="d-flex">
                                <button wire:click="$emitTo('task.edit','showEditModal',{{ $task->id }})" class="btn btn-sm btn-primary">
                                    Edit
                                    <div wire:loading wire:target="showEditModal()">
                                        <div class="spinner-border spinner-border-sm"></div>
                                    </div>
                                </button>
                                <a class="btn btn-sm btn-danger ms-2" href="">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $tasks->links() }}
        </div>
    </div>


</div>
