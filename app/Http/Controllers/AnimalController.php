<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    function index()
    {
        $animals = Animal::all();

        return view('index', compact('animals'));
    }

    function addAnimal()
    {
        $data = request()->validate([
            'name' => 'required',
            'animal' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);

        $animal = Animal::on()->create($data);
        return redirect()->route('index');
    }
}
