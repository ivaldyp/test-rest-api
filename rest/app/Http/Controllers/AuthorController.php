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
        $authors = Author::all();
        $data['authors'] = 
            DB::select('SELECT id, name, country 
                        FROM authors');
        return view('pages.authors.table', $data);
    }

    public function show($id)
    {
        //
    }

    public function showForm()
    {
        return view('pages.authors.form', ['sukses' => 1]);
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
