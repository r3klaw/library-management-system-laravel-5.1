<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

use App\Book;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    /**
     * The book repository instance.
     *
     * @var BookRepository
     */
    protected $books;

    /**
     * Create a new controller instance.
     *
     * @param  BookRepository $books
     * @return void
     */
    public function __construct(BookRepository $books)
    {
        $this->books = $books;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = $this->books->forUser($request->user());

        return view('books.index', [ 'books' => $books ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:books|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|unique:books|max:255',
            'quantity' => 'required|integer',
            'shelf_location' => 'required',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'quantity' => $request->quantity,
            'shelf_location' => $request->shelf_location,
        ]);

        return redirect('/admin/books');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|max:255',
            'quantity' => 'required|integer',
            'shelf_location' => 'required',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'quantity' => $request->quantity,
            'shelf_location' => $request->shelf_location,
        ]);

        return redirect('/admin/books');
    }

    /**
     * Destroy the given book.
     *
     * @param  Request  $request
     * @param  Book  $book
     * @return Response
     */
    public function destroy(Request $request, Book $book)
    {
        $book->delete();

        return redirect('/admin/books');
    }

    /**
     * Search books by book/author (member function)
     *
     * @param  Request  $request
     * @return Response
     */
    public function search(Request $request)
    {
        $books = $this->books->search($request->keyword);

        return view('books.search', [ 'books' => $books ]);
    }

    /**
     * Borrow a book 
     *
     * @param  Request  $request
     * @param  Book $book
     * @return Response
     */
    public function borrow(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), []);

        $validator->after(function($validator) {
            if($this->books->canJuniorMemberBorrow()) {
                $validator->errors()->add('id', 'You are only allowed to borrow 3 books.');
            } 
            else if($this->books->canSeniorMemberBorrow()) {
                $validator->errors()->add('id', 'You are only allowed to borrow 6 books.');
            }
        });

        if ($validator->fails()) {
            return redirect('/member/books/search')
                ->withInput()
                ->withErrors($validator);
        }

        $this->books->borrow($request->user(), $book);

        return redirect('/member/books');
    }

    /**
     * Return a book 
     *
     * @param  Request  $request
     * @param  Book $book
     * @return Response
     */
    public function return(Request $request, Book $book)
    {
        $this->authorize('return', $book);

        $this->books->return($request->user(), $book);

        return redirect('/member/books');
    }

}
