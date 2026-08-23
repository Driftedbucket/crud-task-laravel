<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Tasks</title>
    
</head>
<body>
    <h1>All tasks</h1>

    @if(@session('success'))
        <p><strong>{{session('success')}}</strong></p>
    @endif

    <p><a href="{{route('tasks.create)}}">Create new Task</a></p>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($tasks as @task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->is_completed ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}">View</a> |
                        <a href="{{ route('tasks.edit', $task) }}">Edit</a> |
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="4">No Tasks yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
