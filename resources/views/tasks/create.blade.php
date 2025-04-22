@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Create New Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="6" style="resize: none; width: 100%;" >{{ old('description') }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" {{ old('is_completed') ? 'checked' : '' }}>
            <label for="is_completed" class="form-check-label">Completed</label>
        </div>
        <button type="submit" class="btn btn-success">Save Task</button>
    </form>
@endsection
