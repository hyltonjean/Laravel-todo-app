<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('todos.index')->with('todos', Todo::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('todos.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    $this->validate(request(), [
      'name' => 'required|max:20',
      'description' => 'required'
    ]);

    $data = request()->all();

    $todo = new Todo();
    $todo->name = $data['name'];
    $todo->description = $data['description'];
    $todo->completed = false;

    $todo->save();

    session()->flash('success', 'Todo created successfully');

    return redirect('/todos');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Todo $todo)
  {
    return view('todos.show')->withTodo($todo);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Todo $todo)
  {
    return view('todos.edit')->withTodo($todo);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Todo $todo)
  {
    $this->validate(request(), [
      'name' => 'required|max:20',
      'description' => 'required'
    ]);

    $data = request()->all();

    $todo->name = $data['name'];
    $todo->description = $data['description'];

    $todo->save();

    session()->flash('success', 'Todo updated successfully');

    return redirect('/todos');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Todo $todo)
  {
    $todo->delete();

    session()->flash('success', 'Todo deleted successfully');

    return redirect('/todos');
  }

  public function completed(Todo $todo)
  {
    $todo->completed = true;

    $todo->save();

    session()->flash('success', 'Todo has been completed');

    return redirect('/todos');
  }
}
