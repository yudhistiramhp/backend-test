<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use App\Models\Author;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create(Request $request)
    {
        $authors = Author::orderBy('name')->get();

        $books = Book::where('author_id', $request->author_id)->get();

        return view('rating', compact('authors', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        $rating = Rating::create([
            'book_id' => $request->book_id,
            'rating' => $request->rating,
        ]);

        if ($rating) {
            return redirect('/')->with('success', 'Rating berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan rating.');
        }
    }
}




