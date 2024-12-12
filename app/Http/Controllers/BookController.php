<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $query = $request->input('query', '');
        
        $books = Book::with(['category', 'author', 'ratings'])
            ->where('title', 'like', "%{$query}%")
            ->orWhereHas('author', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->withAvg('ratings', 'rating')
            ->withCount('ratings', 'ratings')
            ->orderByDesc('ratings_count')
            ->orderByDesc('ratings_avg_rating')
            ->paginate($perPage);
    
        return view('book', compact('books', 'query'));
    }
}
