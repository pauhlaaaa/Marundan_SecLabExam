<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'is_completed' => 'sometimes|boolean',
        ]);

        Task::create([
            'title'        => $validated['title'],
            'description'  => $validated['description'] ?? null,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title'        => 'required|string|max:255',
        'description'  => 'nullable|string',
        'is_completed' => 'required|boolean', // Ensure it is a boolean
    ]);

    $task = Task::findOrFail($id);

    $task->update([
        'title'        => $validated['title'],
        'description'  => $validated['description'] ?? null,
        'is_completed' => $validated['is_completed'], // Use the validated value
    ]);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task updated successfully.');
}
    /**
     * Remove the specified task from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully.');
    }
}
