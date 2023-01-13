<div class="d-flex justify-content-center">
    <div class="col-md-6 card shadow rounded">
        <h3 class="text-center mt-3">LiveWire</h3>

        @if ($showRegister)
            <livewire:auth.register />
        @else
            <livewire:auth.login />
        @endif
    </div>
</div>
