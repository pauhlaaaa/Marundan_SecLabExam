@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Your Tasks</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td class="align-middle">
                    @if($task->is_completed)
                        <s>{{ $task->title }}</s>
                    @else
                        {{ $task->title }}
                    @endif
                </td>
                <td class="align-middle">{{ Str::limit($task->description, 50) }}</td>
                <td class="align-middle">
                    @if($task->is_completed)
                        <span class="badge bg-success">Completed</span>
                    @else
                        <span class="badge bg-secondary">Pending</span>
                    @endif
                </td>
                <td class="align-middle">
                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No tasks found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
