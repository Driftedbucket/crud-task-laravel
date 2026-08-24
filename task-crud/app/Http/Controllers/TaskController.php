<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //read--list all tasks 
        $tasks=Task::latest()->get();
        return view('tasks.index',compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create--creates a task
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save the new task
        $validated=$request->validate([
            'title'=>'required|max:255',
            'description'=>'nullable',
            'is_completed'=>'boolean'
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')
        ->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //display a single task
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //show the edit form 
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //save the changes 
        $validated=$request->validate([
            'title'=>'requred|max:255',
            'description'=>'nullable',
            'is_completed'=>'boolean'
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
        ->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //delete a task
        $task->delete();

        return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
    }
}
