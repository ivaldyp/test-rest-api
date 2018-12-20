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
        $books = Book::all();
        $data['books'] = 
            DB::select('SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
                        FROM books b
                        INNER JOIN authors a ON a.id = b.id_author');
        return view('pages.books.table', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
