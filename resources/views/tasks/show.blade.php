@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Task Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <p class="card-text">
                Status:
                @if($task->is_completed)
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-secondary">Pending</span>
                @endif
            </p>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i>
            </a>

        </div>
    </div>
@endsection
