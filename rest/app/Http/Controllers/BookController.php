<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Book;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        //
    }

    public function showAll()
    {
        $data['books'] = 
            DB::select('SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
                        FROM books b
                        INNER JOIN authors a ON a.id = b.id_author');
        return view('pages.books.table', $data);
    }

    public function showForm()
    {
        return view('pages.books.form');
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->country = $request->country;
        if($book->save()) {
            return redirect('authors/table')->with('message', 'Author data added successfully');
        } else {
            return redirect('authors/form')->with('message', 'Failed to insert author data');
        }
    }

    public function edit($id)
    {
        $author = Author::where('id', $id)->first();
        return view('pages.authors.modal')->with('author', $author);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        $author->name = $request->name;
        $author->country = $request->country;

        if($author->save()) {
            return redirect('authors/table')->with('message', 'Author data edited successfully');
        } else {
            return redirect('authors/form')->with('message', 'Failed to edit author data');
        }
    }

    public function delete($id)
    {
        $author = Author::where('id', $id);
        $author->delete();
        return redirect('authors/table');
    }
}
