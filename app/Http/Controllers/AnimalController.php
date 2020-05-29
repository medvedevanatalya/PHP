<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalController extends Controller
{
    function index()
    {
        $user = auth()->user();
        $animals = $user->animals()->paginate(3);

        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $this->authorize('create', Animal::class);

        return view('animals.form');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Animal::class);

        $data = $this->validated($request);

        $animals = auth()->user()->animals();
        $new = $animals->create($data);

        return redirect()->route('animals.show', $new);
    }

    public function show(Animal $animal)
    {
        $this->authorize('view', $animal);

        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $this->authorize('update', $animal);

        return view('animals.form', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $this->authorize('update', $animal);

        $data = $this->validated($request, $animal);

        $animal->update($data);
        return redirect()->route('animals.show', $animal);
    }

    public function destroy(Animal $animal)
    {
        $this->authorize('delete', $animal);

        $animal->delete();
        return redirect()->route('animals.index');
    }

    protected function validated(Request $request, Animal $animal = null)
    {
        $rules = [
            'name' => 'required|min:5|max:100',
            'animal' => 'required',
            'breed' => 'nullable',
            'gender' => 'required',
            'age' => 'nullable',
            'description' => 'nullable',
            'additional_info' => 'nullable'
        ];

        if($animal)
            $rules['name'] .= ',name,' . $animal->id;

        return $request->validate($rules);
    }

}
