<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Book;
use App\Tag;
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
                        FROM authors
                        ORDER BY name ASC');
        $data['books'] = 
            DB::select('SELECT id, title, id_author, publish_year
                        FROM books
                        ORDER BY publish_year ASC, title ASC');
        return view('pages.authors.table', $data);
    }

    public function showForm()
    {
        return view('pages.authors.form');
    }

    public function search(Request $request)
    {
        $author_name = $request->search_author;
        $data['authors'] = DB::select("
            SELECT id, name, country 
            FROM authors
            WHERE name like '%$author_name%'
            ORDER BY name ASC
            ");
        $data['books'] = 
            DB::select('SELECT id, title, id_author, publish_year
                        FROM books
                        ORDER BY publish_year ASC, title ASC');
        $data['count'] = count($data['authors']);
        return view('pages.authors.table', $data);
    }

    public function sort(Request $request)
    {
        $author_sort = $request->sort_author;
        if ($author_sort == 1) {
            $data['authors'] = DB::select("
            SELECT id, name, country 
            FROM authors
            ORDER BY name ASC
            ");
        } elseif  ($author_sort == 2) {
            $data['authors'] = DB::select("
            SELECT id, name, country 
            FROM authors
            ORDER BY country ASC
            ");
        }

        $data['books'] = 
            DB::select('SELECT id, title, id_author, publish_year
                        FROM books
                        ORDER BY publish_year ASC, title ASC');
        $data['count'] = count($data['authors']);
        return view('pages.authors.table', $data);
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
        $book = DB::select("SELECT id FROM books WHERE id_author = $id ");
        for($i=0; $i<count($book); $i++)
        {
            $id_book = $book[$i]->id;
            $junction = DB::delete("DELETE FROM junction_books_tags where id_book = $id_book ");
            $bookdelete = DB::delete("DELETE FROM books where id = $id_book ");
        }
        if($author->delete()) {
            return redirect('authors/table')->with('message', 'Author data deleted successfully');
        } else {
            return redirect('authors/table')->with('message', 'Failed to delete author data');
        }
        return redirect('authors/table');
    }
}
