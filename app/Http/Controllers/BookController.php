<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
	public function index()
	{
		$books = Book::all();

		return view('welcome', compact('books'));
	}

    public function create(){
        return view('books-form');
    }

    public function store(Request $request){
        Book::create([
            "title" => $request->title,
            "writer" => $request->writer,
            "published_year" => $request->published_year,
            "cover_path" => $request->cover_path,
        ]);

        return redirect("/");
    }

    public function edit(Book $book){
        return view('books-form-edit', compact('book'));
    }

    public function update(Request $request, Book $book){
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:255'],
            'published_year' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'cover_path' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('cover_path')) {
            $validated['cover_path'] = $request->file('cover_path')->store('covers', 'public');
        }

        $book->update($validated);

        return redirect('/');
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect("/");
    }
}