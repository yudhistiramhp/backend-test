<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 1000;
        $totalBooks = 100000;
        
        for ($i = 0; $i < ceil($totalBooks / $chunk); $i++) {
            $books = Book::factory($chunk)->make()->toArray();
            Book::insert($books);
        }
    }
}
