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

    public function create($todosId)
    {
        // Function to return a view to create todos.

        return view('todos.create');
    }
}
