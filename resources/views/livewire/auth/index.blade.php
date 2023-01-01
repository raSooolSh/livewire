<div class="d-flex justify-content-center">
    <div class="col-md-6 card shadow rounded">
        <h3 class="text-center mt-3">LiveWire</h3>

        @if ($showRegister)
            Register
        @else
            <div class="p-3">
                <label for="eamil">Email</label>
                <input type="email" class="form-control" placeholder="johndoe@gmail.com"> 
            </div>
        @endif
    </div>
</div>
