<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
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
    public function create() {
        return view('authors.create', [
            'pageTitle' => 'Add Author'
        ]);
    }

    //strore new author
    public function store(Request $request) {
        $formRequest = $request->validate([
            'author_name' => 'required|min:5|max:100'
        ]);

        Author::create($formRequest);
        return redirect()->route('authors.index');
    }
}
