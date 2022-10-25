<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'pageTitle' => 'Authors',
            'authors' => Author::latest()->paginate(12)
        ]);
    }
}
