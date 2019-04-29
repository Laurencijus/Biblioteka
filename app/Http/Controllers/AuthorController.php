<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('author.index', ['collection' => Author::all()]);
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $author = new Author;
        $author->surname = $request->surname;
        $author->name = $request->name;
        $author->save();
        return redirect()->route('author.index');
    }

    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(Request $request, Author $author)
    {
        $author->surname = $request->surname;
        $author->name = $request->name;
        $author->save();
        return redirect()->route('author.index');
    }

    public function destroy(Author $author)
    {
        if ($author->authorBooks->count() == 0) {
            $author->delete();
        }
        return redirect()->route('author.index');
    }
}
