@php
    $user = Auth::user();
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('guest.home') }}">Boolpress</a>
        <button
        class="navbar-toggler"
        type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Projects
                        </a>                   
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.projects.index') }}">Index</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.projects.create') }}">Add</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Type
                        </a>                   
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.types.index') }}">Index</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.types.create') }}">Add</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Technology
                        </a>                   
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.technologies.index') }}">Index</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.technologies.create') }}">Add</a></li>
                        </ul>
                    </li>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $user->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Edit Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-primary">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>