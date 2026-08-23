<!DOCTYPE html>
<html>
<head>
    <title>Task Details</title>
</head>
<body>
    <h1>Task #{{ $task->id }}</h1>

    <p><strong>Title:</strong> {{ $task->title }}</p>
    <p><strong>Description:</strong> {{ $task->description ?? 'None' }}</p>
    <p><strong>Completed:</strong> {{ $task->is_completed ? 'Yes' : 'No' }}</p>
    <p><strong>Created:</strong> {{ $task->created_at }}</p>

    <p>
        <a href="{{ route('tasks.edit', $task) }}">Edit</a> |
        <a href="{{ route('tasks.index') }}">Back to list</a>
    </p>
</body>
</html>