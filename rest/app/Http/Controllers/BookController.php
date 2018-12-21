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

class BookController extends Controller
{
    public function index()
    {
        //
    }

    public function showAll()
    {
        $data['books'] = DB::select('SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
                        FROM books b
                        INNER JOIN authors a ON a.id = b.id_author');
        $data['count'] = count($data['books']);
        return view('pages.books.table', $data);
    }

    public function showForm()
    {
        $data['tags'] = Tag::all();
        $data['authors'] = Author::all();
        return view('pages.books.form', $data);
    }

    public function show($id)
    {
        //
    }

    public function search(Request $request)
    {
        $book_name = $request->search_book;
        $data['books'] = DB::select("
            SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
            FROM books b
            INNER JOIN authors a ON a.id = b.id_author
            WHERE b.title like '%$book_name%'
            ");
        $data['count'] = count($data['books']);
        return view('pages.books.table', $data);
    }

    public function sort(Request $request)
    {
        $book_sort = $request->sort_book;
        if ($book_sort == 1) {
            $data['books'] = DB::select("
            SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
            FROM books b
            INNER JOIN authors a ON a.id = b.id_author
            ORDER BY b.title ASC
            ");
        } elseif  ($book_sort == 2) {
            $data['books'] = DB::select("
            SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
            FROM books b
            INNER JOIN authors a ON a.id = b.id_author
            ORDER BY b.publish_year ASC
            ");
        } elseif ($book_sort == 3) {
            $data['books'] = DB::select("
            SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
            FROM books b
            INNER JOIN authors a ON a.id = b.id_author
            ORDER BY a.name ASC
            ");
        }
        $data['count'] = count($data['books']);
        return view('pages.books.table', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->synopsis = $request->synopsis;
        $book->publish_year = $request->publish_year;
        $book->id_author = $request->id_author;

        if($book->save()) {
            return redirect('books/table')->with('message', 'Book data added successfully');
        } else {
            return redirect('books/form')->with('message', 'Failed to insert book data');
        }
    }

    public function edit($id)
    {
        $data['tags'] = Tag::all();
        $data['authors'] = Author::all();
        $data['book'] = Book::where('id', $id)->first();
        return view('pages.books.modal')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->title = $request->title;
        $book->synopsis = $request->synopsis;
        $book->publish_year = $request->publish_year;
        $book->id_author = $request->id_author;
        $book->id_type = $request->id_type;

        if($book->save()) {
            return redirect('books/table')->with('message', 'Book data edited successfully');
        } else {
            return redirect('books/form')->with('message', 'Failed to edit book data');
        }
    }

    public function delete($id)
    {
        $book = Book::where('id', $id);
        if($book->delete()) {
            return redirect('books/table')->with('message', 'Book data deleted successfully');
        } else {
            return redirect('books/table')->with('message', 'Failed to delete book data');
        }
        return redirect('books/table');
    }
}
