<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    private $bookValidation = [
        'title' => 'required|max:50',
        'author' => 'required|max:60',
        'price' => 'required|numeric',
        'isbn' => 'required|size:13',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        // dd($books);    
        
        return view("books.index", compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // validation
        $request->validate($this->bookValidation);

        $book = new Book();
        // $book->title = $data["title"];
        // $book->author = $data["author"];
        // $book->price = $data["price"];
        // $book->isbn = $data["isbn"];
        // $book->description = $data["description"];
        $book->fill($data);
        $result = $book->save();

        // $newBook = Book::orderBy('id', 'DESC')->first();

        // return redirect()->route('books.show', $newBook);
        return redirect()
            ->route('books.index')
            ->with('message', "Libro '" . $book->title. "' creato correttamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $book = Book::findOrFail($id);

        // // dd($book);
        // if(empty($book)) {
        //     abort('404');
        // }
        // dd($book->getAttributes());
        return view("books.show", compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view("books.edit", compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        $request->validate($this->bookValidation);
        
        $book->update($data);

        return redirect()
            ->route('books.index')
            ->with('message', "Libro '" . $book->title. "' aggiornato correttamente!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // dd($book);
        $title = $book->title;
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('message', "Libro '" . $title. "' eliminato correttamente!");        
    }
}
