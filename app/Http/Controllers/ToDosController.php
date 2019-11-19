<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class ToDosController extends Controller
{
    public function index()
    {
        // Fetch all ToDos from databadse and display them in web page.

        $todos = Todo::all();

        return view('todos.index')->with('todos', $todos);
    }

    public function show($todosId)
    {
        // Function to fetch ToDo from DB to show.
        $todo = Todo::find($todosId);
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        // Function to return a view to create todos.
        return view('todos.create');
    }

    public function store()
    {
        // Function to store ToDo in DB.
        $this->validate(request(), [
            'name' => 'required|min:2|max:20',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        return redirect('/todos');
    }
}
