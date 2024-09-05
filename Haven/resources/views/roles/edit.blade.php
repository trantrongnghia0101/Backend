
    <div class="container">
        <h1>Edit Role</h1>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $role->role) }}">
                @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
