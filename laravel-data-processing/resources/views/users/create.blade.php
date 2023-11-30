<html>
<body>
<h2>Create User</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Create User</button>
    </form>
</body>
</html>
