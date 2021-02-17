<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index() {

        $books = Book::all();
        // dd($books);

        return response()->json($books);
    }

    public function price($max) {

        $books = Book::where('price', '<', $max)
        ->where('isbn', '>', 100000)
        ->orderBy('title', 'ASC')
        ->get();
        // dd($books);

        return response()->json($books);
    }

    public function show($id) {

        $book = Book::findOrFail($id);
        // dd($books);

        return response()->json($book);
    }
}
