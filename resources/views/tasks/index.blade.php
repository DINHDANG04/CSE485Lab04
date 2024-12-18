<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách công việc</title>
</head>
<body>
    <h1>Danh sách công việc</h1>
    <a href="{{ route('tasks.create') }}">Thêm công việc mới</a>
    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->name }} 
                <a href="{{ route('tasks.edit', $task->id) }}">Sửa</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
