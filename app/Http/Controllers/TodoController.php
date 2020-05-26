<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();
        $todos = $user->todos()->paginate(1);

        return view('todos.index',compact('user', 'todos'));
    }

    public function create()
    {
        return view('todos.form');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        /** @var HasMany $todos */
        $todos = auth()->user()->todos();
        $new = $todos->create($data);

        return redirect()->route('todos.show', $new);
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.form', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $this->validated($request, $todo);

        $todo->update($data);
        return redirect()->route('todos.show', $todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }

    protected function validated(Request $request, Todo $todo)
    {
        $rules = $request->validate([
            'title' => 'required|min:5|max:100|unique:todos',
            'description' => 'nullable',
            'done' => 'boolean'
        ]);

        if($todo)
            $rules['title'] .= ',title,' . $todo->id;

        return $request->validate($rules);

    }
}
