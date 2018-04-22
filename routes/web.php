<?php
use App\Book;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

//   Route::get('/', function() {
//     return view('books');
//  })->middleware('auth');

Route::get('/', function () {
    return view('home');
});

Route::get('books', function () {
    $books = Book::orderBy('created_at', 'asc')->get();

    return view('books', [
        'books' => $books
    ]);
})->middleware('auth');

/**
 * Add New Book
 */
Route::post('/book', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'bookname' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

   
    $request->user()->books()->create([
        'bookname' => $request->bookname,
    ]);

    $request->session()->flash('message', 'Successfully added the Book!');
    return redirect('books');
    
})->middleware('auth');

/**
 * Delete Book
 */
Route::delete('/book/{book}', function (Book $book) {
    $book->delete();

    return redirect('books');
})->middleware('auth');



//   Route::get('/edit', function () {
//       return view('edit', compact('book', $book));
//  });


// Route::patch('book', function (Request $request, Book $book) {
//     $request->validate([
//         'bookname' => 'required|min:3',
//     ]);
    
//     $book->bookname = $request->bookname;
//     $book->save();
    
//     return redirect('books');
// })->middleware('auth');

Route::get('/book/{book}', 'BookController@edit')->name('edit');
Route::put('/book/{book}', 'BookController@update')->name('update');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
