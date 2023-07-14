<div>
    <header>
        <h2 class="text-center">
            Update Password
        </h2>

        <p class="text-center">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <div class="container">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
    
            <div>
                <label for="current_password" class="form-label">Current Password</label>
                <input id="current_password" name="current_password" type="password" class="form-control">
                @error('current_password')
                    {{ $message }}
                @enderror
            </div>
    
            <div>
                <label for="password" class="form-label">New Password</label>
                <input id="password" name="password" type="password" class="form-control">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
    
            <div>
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </div>
    
            <div>
                <button class="btn btn-primary mb-3">Save</button>
    
                @if (session('status') === 'password-updated')
                    <p>Saved</p>
                @endif
            </div>
        </form>
    </div>
</div>
