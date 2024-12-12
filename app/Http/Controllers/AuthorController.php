<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class AuthorController extends Controller
{
    public function topAuthors()
    {
        $topAuthors = Author::withCount(['books', 'ratings as total_voter' => function ($query) {
                $query->where('rating', '>', 5);
            }])
            ->orderByDesc('total_voter')
            ->paginate(10);
    
        return view('author', compact('topAuthors'));
    }
    
}

