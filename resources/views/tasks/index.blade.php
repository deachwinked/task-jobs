<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-8">
                <h2>Task List</h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
            </div>
        </div>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="card">
            <div class="card-body">
                @if ($tasks->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Assigned Users</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ Str::limit($task->description, 50) }}</td>
                                    <td>
                                        {{ $task->users->pluck('name')->implode(', ') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No tasks found.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html> 