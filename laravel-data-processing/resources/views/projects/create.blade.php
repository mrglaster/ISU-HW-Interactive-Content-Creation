<html>
    <body>
    <h2>Create Project</h2>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Create Project</button>
    </form>
    </body>
</html>

