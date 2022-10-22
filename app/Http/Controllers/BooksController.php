<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'pageTitle' => 'এসো বই পড়ি | Book List',
            'books' => Book::latest()->get()
        ];

        return view('books.index', $data);
    }

    public function manage()
    {
        $data = [
            'books' => Book::orderBy('id', 'desc')->paginate(10),
        ];

        return view('books.manage', $data);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $formRequest = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Book::create($formRequest);

        return redirect('/books');
    }

    public function show($id)
    {
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
            'description'
        ]);

        Book::where('id', $id)->update($formRequest);

        return redirect()->route('manage.books.index')->with(['message' => 'Books updated successfully!']);
    }

    public function destroy($id)
    {
        Book::where('id', $id)->delete();

        return redirect()->route('manage.books.index')->with(['message' => 'Books deleted successfully!']);
    }
}