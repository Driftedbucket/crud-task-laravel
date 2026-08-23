<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Title:</label><br>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
            @error('title')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <br>

        <div>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description', $task->description) }}</textarea>
        </div>
        <br>

        <div>
            <label>
                <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>
                Completed?
            </label>
        </div>
        <br>

        <button type="submit">Update Task</button>
        <a href="{{ route('tasks.index') }}">Cancel</a>
    </form>
</body>
</html>