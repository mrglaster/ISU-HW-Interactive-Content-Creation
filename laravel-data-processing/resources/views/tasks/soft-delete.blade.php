<html>
<body>
    <h2>Soft Delete Task</h2>
    <p>Are you sure you want to soft delete this task?</p>
    
    <form action="{{ route('tasks.soft-delete', $task) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Soft Delete Task</button>
    </form>

</body>
</html>