<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.form');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'tag' => 'required|unique'
        ]);

        Tag::create($data);

        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        return view('tags.form', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $this->validate($request, [
            'tag' => 'required|unique'
        ]);

        $tag->update($data);

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
