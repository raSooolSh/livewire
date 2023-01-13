<div class="position-absolute" style="left: -4vw;
padding: 0.6rem;">
    @if (session()->has('Success'))
        <div class="alert alert-success custom-toast">
            {{ session()->get('Success') }}
        </div>
    @endif

    @if (session()->has('Error'))
        <div class="alert alert-danger custom-toast">
            {{ session()->get('Error') }}
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.processed', function(msg, component) {
                if (component.fingerprint.name == 'task.notification') {
                    let toasts = document.querySelectorAll('.custom-toast');
                    toasts.forEach(element => {
                        setTimeout(() => {
                            element.classList.add('d-none')
                        }, 5000);
                    });
                }
            })
        })
    </script>
</div>
