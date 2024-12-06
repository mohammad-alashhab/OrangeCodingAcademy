<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('index', compact('todos'));
    }

    public function dashboard()
    {
        $todos = Todo::all();
        return view('dashboard', compact('todos'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Create the new To-Do item in the database
        Todo::create([
            'title' => $request->title,
            'description' => $request->description ?? '',
            'is_completed' => false, // New to-do starts as not completed
        ]);

        // Redirect with success message
        return redirect()->route('todos.index')->with('success', 'To-Do item created successfully.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_completed' => 'nullable|boolean',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->is_completed = $request->has('is_completed') ? 1 : 0;
        $todo->save();

        return redirect()->route('dashboard')->with('success', 'To-Do item updated successfully.');
    }


    public function toggleComplete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['is_completed' => !$todo->is_completed]);

        return redirect()->route('todos.index')->with('success', 'To-Do item status updated.');
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect()->route('todos.index')->with('success', 'To-Do item deleted successfully.');
    }
}
