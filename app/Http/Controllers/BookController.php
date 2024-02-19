<?php

namespace App\Http\Controllers;

use App\models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $book = Book::query();

        if ($request->role_id) {
            $book->whereHas('roles', function ($query) {
                $query->where('roles.id', request('role_id'));
            });
        }
        $book = $book->get();
        return view('books.index', [
            'books' => $book
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('books.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book' => 'required',
            'author' => 'required',
        ]);

        $Book = new Book;
        $Book->book = $request->book;
        $Book->user_id = $request->author;

        $Book->save();

        return redirect()->to('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $book = book::where('id', $id)->first();
        return view('books.edit', compact('users', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'book' => 'required',
            'author' => 'required',
        ]);

        $Book = Book::where('id', $id)->first();

        $Book->book = $request->book;
        $Book->user_id = $request->author;

        $Book->save();

        return back()->withSuccess('Book Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = book::where('id', $id)->first();
        $book->delete();
        return back()->withSuccess('Book Deleted!!');
    }
}
