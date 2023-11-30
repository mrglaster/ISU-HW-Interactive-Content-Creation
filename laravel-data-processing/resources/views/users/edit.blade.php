<html>
    <body>
    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <button type="submit">Update User</button>
    </form>    
</body>
</html>