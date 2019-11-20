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

    public function show(Todo $todo)
    {
        // Function to fetch ToDo from DB to show.
        // $todo = Todo::find($todosId);
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

        session()->flash('success', 'Todo created succesfully.');

        return redirect('/todos');
    }

    // public function edit($todoId)
    public function edit(Todo $todo)
    {
        // $todo = Todo::find($todoId);

        return view('todos.edit')->with('todo', $todo);
    }

    // public function update($todoId)
    public function update(Todo $todo)
    {
        //Function to update record in DB
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();
        // $todo = Todo::find($todoId);
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated succesfully.');

        return redirect('/todos');
    }


    // public function destory($todoId)
    public function destory(Todo $todo)
    {
        //Function to delete record from DB
        $data = request()->all();
        // $todo = Todo::find($todoId);

        $todo->delete();

        session()->flash('success', 'Todo deleted succesfully.');

        return redirect('/todos');
    }

    // public function destory($todoId)
    public function complete(Todo $todo)
    {
        //Function to complete the Todo
        $todo->completed = true;
        $todo->save();

        session()->flash('success', 'Todo completed succesfully.');

        return redirect('/todos');
    }
}
