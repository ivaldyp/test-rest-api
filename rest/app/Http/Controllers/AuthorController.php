<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Author;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        //
    }

    public function showAll()
    {
        // $authors = Author::all();
        $data['authors'] = 
            DB::select('SELECT id, name, country 
                        FROM authors');
        return view('pages.authors.table', $data);
    }

    public function showForm()
    {
        return view('pages.authors.form');
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
        $author = new Author;
        $author->name = $request->name;
        $author->country = $request->country;
        if($author->save()) {
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
        if($author->delete()) {
            return redirect('authors/table')->with('message', 'Author data deleted successfully');
        } else {
            return redirect('authors/table')->with('message', 'Failed to delete author data');
        }
        return redirect('authors/table');
    }
}
