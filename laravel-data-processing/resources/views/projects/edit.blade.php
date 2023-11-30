<html>
    <body>
<h2>Edit Project</h2>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $project->name }}" required>
        <button type="submit">Update Project</button>
    </form>
</body>
</html>