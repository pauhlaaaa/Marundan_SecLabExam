@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Task</h1>

    <!-- Added form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <!-- Hidden input to send false if checkbox is unchecked -->
        <input type="hidden" name="is_completed" value="0">
        <div class="form-check">
            <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" value="1" {{ $task->is_completed ? 'checked' : '' }}>
            <label for="is_completed" class="form-check-label">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
    <!-- End of added form -->


@endsection
