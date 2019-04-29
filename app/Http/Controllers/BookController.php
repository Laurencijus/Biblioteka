<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {

        $publishers = Book::distinct('publisher')->pluck('publisher');

        return view('book.index', [
            'author_default' => 0,
            'pub_default' => 0,
            'collection' => Book::all(),
            'authors' => Author::all(),
            'publishers' => $publishers,
        ]
        );
    }

    public function filter(Request $request)
    {
        $by = $request->by;

        if ($by == 'author') {
            $author_id = $request->author_id;
            return redirect()->route('book.filter.author', [$author_id]);
        }

        if ($by == 'publisher') {
            $book_id = Book::where('publisher', $request->publisher)->first()->id;
            return redirect()->route('book.filter.publisher', [$book_id]);
        }

    }

    public function showByAuthor($author_id)
    {
        $collection = Book::where('author_id', $author_id)->get();
        $publishers = Book::distinct('publisher')->pluck('publisher');

        return view('book.index', [
            'author_default' => $author_id,
            'pub_default' => 0,
            'collection' => $collection,
            'authors' => Author::all(),
            'publishers' => $publishers,
        ]);
    }

    public function showByPublisher($book_id)
    {
        $publisher = Book::where('id', $book_id)->first()->publisher;
        $collection = Book::where('publisher', $publisher)->get();
        $publishers = Book::distinct('publisher')->pluck('publisher');

        return view('book.index', [
            'author_default' => 0,
            'pub_default' => $publisher,
            'collection' => $collection,
            'authors' => Author::all(),
            'publishers' => $publishers,
        ]);
    }

    public function create()
    {
        return view('book.create', ['collection' => Author::all()]);
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->critic = $request->critic;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index');
    }

    public function edit(Book $book)
    {
        return view('book.edit', ['collection' => Author::all(), 'book' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->critic = $request->critic;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
