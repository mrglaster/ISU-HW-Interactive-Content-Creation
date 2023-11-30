<html>
<body>
<h2>Soft Delete User</h2>
    <p>Are you sure you want to soft delete this user?</p>
    
    <form action="{{ route('users.soft-delete', $user) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Soft Delete User</button>
    </form>

    <a href="{{ route('users.index') }}">Cancel</a>
</body>
</html>