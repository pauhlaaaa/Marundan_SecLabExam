<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
    </style>
</head>
<body>


<div class="container-fluid bg-secondary text-white py-2 shadow-sm">
    <div class="text-center">
        <h2 class="fw-bold">Task Management System</h2>
    </div>
</div>

<div class="container-fluid bg-white py-2 px-4 shadow-sm">
    <div class="d-flex justify-content-end gap-3">
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">All Tasks</a>
        <a href="{{ route('tasks.create') }}" class="btn btn-secondary text-white">New Task</a>
    </div>
</div>


<div class="container-fluid py-4 px-4">
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="bg-white p-4 shadow-sm">

        @yield('content')
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
