<html>
<body>
<h2>Soft Delete Project</h2>
    <p>Are you sure you want to soft delete this project? This will also delete all associated tasks.</p>
    
    <form action="{{ route('projects.soft-delete', $project) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Soft Delete Project</button>
    </form>

    <a href="{{ route('projects.index') }}">Cancel</a>
</body>
</html>