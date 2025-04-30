<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $book = Book::all();
        return view('admin.books.index', compact('book'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required|unique:books,penerbit',
            'year' => 'required|numeric',
            'status' => 'required|in:available,borrowed,maintenance'
        ]);
    
      
        Book::create($validated);
    
        return redirect()->route('admin.books.index')->with('success', 'Kendaraan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books,book_code,' . $book->id,
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required|unique:books,pengarang,' . $book->id,
            'year' => 'required|numeric',
            'status' => 'required|in:available,borrowed,maintenance'
        ]);

        $book->update($validated);
        return redirect()->route('admin.books.index')->with('success', 'Kendaraan berhasil diupdate');
    }

    public function destroy(Book $book)
    {
        
        if ($book->transaction()->where('status', 'borrowed')->exists()) {
            return back()->with('error', 'Kendaraan sedang dipinjam dan tidak dapat dihapus');
        }
        

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Kendaraan berhasil dihapus');
    }
}
