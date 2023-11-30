<html>
    <body>
    <h2>Edit Task</h2>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>
        
        <label for="description">Description:</label>
        <textarea name="description" required>{{ $task->description }}</textarea>
        
        <label for="user_id">Assign User:</label>
        <select name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $task->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <label for="project_id">Belongs to Project:</label>
        <select name="project_id" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update Task</button>
    </form>
    </body>
</html>