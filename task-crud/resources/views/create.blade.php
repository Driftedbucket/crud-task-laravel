<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div>
            <label>Title:</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <br>

        <div>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <br>

        <div>
            <label>
                <input type="checkbox" name="is_completed" value="1">
                Completed?
            </label>
        </div>
        <br>

        <button type="submit">Create Task</button>
        <a href="{{ route('tasks.index') }}">Cancel</a>
    </form>
</body>
</html>