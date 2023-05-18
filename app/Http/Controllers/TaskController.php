<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('employee')->latest()->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.tasks.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:250',
            'employee_id' => 'numeric|nullable',
        ]);

        if ('' != $request->employee_id) {
            $validated += ['status' => 'Assigned'];
        }

        Task::create($validated);

        // The blog post is valid...

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $employees = Employee::all();
        return view('admin.tasks.edit', compact('task', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:250',
            'employee_id' => 'numeric|nullable',
        ]);

        if ('' != $request->employee_id) {
            $validated += ['status' => 'Assigned'];
        } elseif ('' == $request->employee_id) {
            $validated += ['status' => 'Unassigned'];
        }

        $task->update($validated);

        // The blog post is valid...

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }

    public function startTask(Task $task)
    {
        $task->status = 'In Progress';
        $task->save();

        return redirect('/tasks');
    }

    public function endTask(Task $task)
    {
        $task->status = 'Done';
        $task->save();

        return redirect('/tasks');
    }
}
