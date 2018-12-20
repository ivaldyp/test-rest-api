<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Book;
use App\Http\Resources\Book as BookResource;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::all();
        $data['books'] = 
            DB::select('SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
                        FROM books b
                        INNER JOIN authors a ON a.id = b.id_author
                        ORDER BY b.id ASC');
        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
        // return BookResource::collection($books);
    }

    public function search(Request $request)
    {
        // $book_name = $request->search_book;
        $book_name = $request->input('search_book');
        $data['books'] = DB::select("
            SELECT b.id as id_book, b.title, b.synopsis, b.publish_year, a.name, a.id as id_author
            FROM books b
            INNER JOIN authors a ON a.id = b.id_author
            WHERE b.title like '%$book_name%'
            ");
        $data['count'] = count($data['books']);
        
        return response()->json([
            "message" => "success",
            "total" => $data['count'],
            "data" => $data['books']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = $request->isMethod('put') ? Book::findOrFail($request->id) : new Book;

        $book->id = $request->input('id');
        $book->title = $request->input('title');
        $book->synopsis = $request->input('synopsis');
        $book->publish_year = $request->input('publish_year');

        if($book->save()){
            return new BookResource($book);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->delete()) {
            return new BookResource($book);
        }
    }
}
