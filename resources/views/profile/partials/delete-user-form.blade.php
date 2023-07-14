<div>
    <header>
        <h2 class="text-center">
            Delete Account
        </h2>

        <p class="text-center">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <div class="container">
        <form method="post" action="{{ route('admin.profile.destroy') }}">
            @csrf
            @method('delete')
    
            <div>
                <label for="password_delete" class="form-label">Password</label>
                <input id="password_delete" name="password" type="password" class="form-control">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <button class="btn btn-danger">Delete Account</button>
        </form>
    </div>
</div>
