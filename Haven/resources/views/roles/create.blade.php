    
    <div class="container">
        <h1>Create Role</h1>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}">
                @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Role</button>
        </form>
    </div>
