<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'এসো বই পড়ি | Book List',
            'books' => Book::latest()->filter(request(['search']))->paginate(10)
        ];

        return view('books.index', $data);
    }


    public function show($id)
    {
        $data = [
            'book' => Book::findOrFail($id)
        ];
        return view('books.single', $data);
    }

    public function manage()
    {
        $data = [
            'books' => Book::latest()->filter(request(['search']))->paginate(10)
        ];
        return view('books.manage', $data);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // dd($request->file('logo'));

        $formRequest = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'isbn' => 'required|numeric',
            'category' => 'required',
            'author' => 'required',
            'total_books' => 'required|numeric',
            'book_source' => 'required',
            'rack_no' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $formRequest['image'] = $request->file('image')->store('images', 'public');
        }

        Book::create($formRequest);

        return redirect('/books');
    }


    public function edit($id)
    {
        $data = [
            'pageTitle' => 'Edit Book',
            'book' => Book::findOrFail($id)
        ];

        return view('books.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $formRequest = $request->only([
            'title',
            'description',
            'image',
            'isbn',
            'category',
            'author',
            'total_books',
            'book_source',
            'rack_no'
        ]);

        if ($request->hasFile('image')) {
            $formRequest['image'] = $request->file('image')->store('images', 'public');
        }

        Book::where('id', $id)->update($formRequest);

        return redirect()->route('manage.books.index')->with(['message' => 'Book updated successfully!']);
    }

    public function destroy($id)
    {
        Book::where('id', $id)->delete();

        return redirect()->route('manage.books.index')->with(['message' => 'Book has been moved to trash!']);
    }

    public function trashed()
    {
        $books = Book::onlyTrashed()->latest()->paginate(10);
        // dd($books);
        return view('books.trashed', compact('books'));
    }

    public function trashedRestore($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore($id);
        return redirect()->route('manage.books.index')->with(['message' => 'Book restored successfully!']);
    }

    public function trashedDestroy($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();
        return redirect()->route('books.trashed')->with(['message' => 'Book deleted successfully!']);
    }

    // public function search(Request $request)
    // {
    //     // $bookName = $request->search;
    //     return $book = Book::where('title', 'LIKE', '%' . $request->search . '%')->get();
    //     return view('books.index', compact('book'));
    // }
}