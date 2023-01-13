<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Livewire</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == 'tasks' ? 'active' : ''}}" aria-current="page" href="{{ route('tasks') }}">Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <ul class="navbar-nav align-items-center">
          @if(auth()->check())
          <li class="nav-link">
            {{ Auth()->user()->name}}
          </li>
          <li class="nav-link">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="btn btn-danger" type="submit">Logot</button>
            </form>
          </li>
          @else
          {{-- <li class="nav-link"> --}}
            <a class="btn btn-success" href="{{ route('login') }}">Login</a>
          {{-- </li> --}}
          @endif
        </ul>
      </div>
    </div>
  </nav>