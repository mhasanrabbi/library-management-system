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

    //strore new author
    public function store(Request $request)
    {
        $formRequest = $request->validate([
            'author_name' => 'required|min:4|max:30|unique:authors|regex:/^[a-zA-Z- ]*$/'
        ]);

        Author::create($formRequest);
        return redirect()->route('authors.index')->with('message', 'Author created successfully!');
    }

    //show all author for manage
    public function manage()
    {
        return view('authors.manage', [
            'pageTitle' => 'Manage Authors',
            'authors' => Author::latest()->paginate(6)
        ]);
    }

    //update author
    public function update(Request $request, $id)
    {
        $formRequest = $request->validate([
            'author_name' => 'required|min:4|max:30|unique:authors|regex:/^[a-zA-Z- ]*$/'
        ]);

        Author::where('id', $id)->update($formRequest);
        return redirect()->back()->with('message', 'Author updated successfully!');
    }

    //delete author
    public function destroy($id) {

        Author::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Author deleted successfully!');
    }
}