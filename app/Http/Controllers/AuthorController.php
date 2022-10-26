<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //show all authors
    public function index()
    {
        return view('authors.index', [
            'pageTitle' => 'Authors',
            'authors' => Author::latest()->paginate(12)
        ]);
    }

    //show create author page
    // public function create() {
    //     return view('authors.create', [
    //         'pageTitle' => 'Add Author'
    //     ]);
    // }

    //strore new author
    public function store(Request $request) {
        $formRequest = $request->validate([
            'author_name' => 'required|min:4|max:30|unique:authors|regex:/^[a-zA-Z- ]*$/'
        ]);

        Author::create($formRequest);
        return redirect()->route('authors.index')->with('message', 'Author created successfully!');
    }

    //show all author for manage
    public function manage() {
        return view('authors.manage', [
            'pageTitle' => 'Manage Authors',
            'authors' => Author::latest()->paginate(7)
        ]);
    }
}
