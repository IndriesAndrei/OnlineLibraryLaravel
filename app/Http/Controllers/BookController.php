<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    

    public function edit(Book $book)
    {
        return view('edit', compact('book'));
    }


    public function update(Request $request, Book $book)
    {
        $book->bookname = $request->bookname;
        $book->save();
        return redirect('books'); 
    }
}
