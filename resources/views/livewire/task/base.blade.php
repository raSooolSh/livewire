<div class="position-relative">
    <div class="mb-3">
        <livewire:task.notification />
    </div>
    <div class="d-flex justify-content-between">
        <div class="col-md-4">
            <livewire:task.create />
        </div>

        <div class="col-md-8">
            <livewire:task.index />
        </div>
    </div>

    <livewire:task.edit />

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let task_edit_modal = document.getElementById('task_edit_modal');

            if (task_edit_modal) {
                task_edit_modal = new bootstrap.Modal(task_edit_modal);

                Livewire.on('openEditModalOnTasks', function() {
                    task_edit_modal.show()
                });

                Livewire.on('closeEditModalOnTasks', function() {
                    task_edit_modal.hide()
                })
            }

        })
    </script>
</div>
