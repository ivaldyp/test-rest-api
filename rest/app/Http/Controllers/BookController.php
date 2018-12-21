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
                        INNER JOIN authors a ON a.id = b.id_author
                        ORDER BY b.title ASC');
        $data['tags'] = 
            DB::select('SELECT b.id as book_id, t.id as tag_id, t.name_type 
                        FROM junction_books_tags j 
                        INNER JOIN tags t ON t.id = j.id_type 
                        INNER JOIN books b ON b.id = j.id_book
                        ORDER BY t.name_type');
        $data['count'] = count($data['books']);
        return view('pages.books.table', $data);
    }

    public function showForm()
    {
        $data['tags'] = Tag::all()->sortBy("name_type");
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
        $data['tags'] = 
            DB::select('SELECT b.id as book_id, t.id as tag_id, t.name_type 
                        FROM junction_books_tags j 
                        INNER JOIN tags t ON t.id = j.id_type 
                        INNER JOIN books b ON b.id = j.id_book
                        ORDER BY t.name_type');
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
            ORDER BY a.name ASC
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
            ORDER BY b.title ASC
            ");
        }

        $data['tags'] = 
            DB::select('SELECT b.id as book_id, t.id as tag_id, t.name_type 
                        FROM junction_books_tags j 
                        INNER JOIN tags t ON t.id = j.id_type 
                        INNER JOIN books b ON b.id = j.id_book
                        ORDER BY t.name_type');
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
        $tag_ids = $request->id_type;

        if($book->save()) {
            $id = DB::getPdo()->lastInsertId();
            for($i=0; $i<count($tag_ids); $i++)
            {
                $id_type = $tag_ids[$i];
                DB::insert("INSERT INTO junction_books_tags (id_book, id_type) VALUES ($id, $id_type) ");
            }
            return redirect('books/table')->with('message', 'Book data added successfully');
        } else {
            return redirect('books/form')->with('message', 'Failed to insert book data');
        }
    }

    public function edit($id)
    {
        $data['tagsall'] = Tag::all();
        $data['authors'] = Author::all();
        $data['book'] = Book::where('id', $id)->first();
        $data['tags'] = 
            DB::select("SELECT b.id as book_id, t.id as tag_id, t.name_type 
                        FROM junction_books_tags j 
                        INNER JOIN tags t ON t.id = j.id_type 
                        INNER JOIN books b ON b.id = j.id_book
                        WHERE b.id = '$id'
                        ORDER BY t.name_type");
        return view('pages.books.modal')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->title = $request->title;
        $book->synopsis = $request->synopsis;
        $book->publish_year = $request->publish_year;
        $book->id_author = $request->id_author;
        $tag_ids = $request->id_type;

        $junction = DB::delete("DELETE FROM junction_books_tags where id_book = $id ");

        if($book->save()) {
            for($i=0; $i<count($tag_ids); $i++)
            {
                $id_type = $tag_ids[$i];
                DB::insert("INSERT INTO junction_books_tags (id_book, id_type) VALUES ($id, $id_type) ");
            }
            return redirect('books/table')->with('message', 'Book data edited successfully');
        } else {
            return redirect('books/form')->with('message', 'Failed to edit book data');
        }
    }

    public function delete($id)
    {
        $junction = DB::delete("DELETE FROM junction_books_tags where id_book = $id ");
        $book = Book::where('id', $id);
        if($book->delete()) {
            return redirect('books/table')->with('message', 'Book data deleted successfully');
        } else {
            return redirect('books/table')->with('message', 'Failed to delete book data');
        }
        return redirect('books/table');
    }
}
