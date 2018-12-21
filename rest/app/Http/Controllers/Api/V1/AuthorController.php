<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Author;
use App\Http\Resources\Author as AuthorResource;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $authors = Author::all();
        // return AuthorResource::collection($authors);

        $data['authors'] = 
            DB::select('SELECT id, name, country
                        FROM authors
                        ORDER BY id ASC');
        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }
    
    public function indexname()
    {
        // $authors = Author::all();
        // return AuthorResource::collection($authors);

        $data['authors'] = 
            DB::select('SELECT id, name, country
                        FROM authors
                        ORDER BY name ASC');
        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    public function indexcountry()
    {
        // $authors = Author::all();
        // return AuthorResource::collection($authors);

        $data['authors'] = 
            DB::select('SELECT id, name, country
                        FROM authors
                        ORDER BY country ASC');
        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    public function search(Request $request)
    {
        $author_name = $request->input('search_author');
        $data['authors'] = DB::select("
            SELECT id, name, country
            FROM authors
            WHERE name like '%$author_name%'
            ");
        $data['count'] = count($data['authors']);
        
        return response()->json([
            "message" => "success",
            "total" => $data['count'],
            "data" => $data['authors']
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
        $author = $request->isMethod('put') ? Author::findOrFail($request->id) : new Author;

        $author->id = $request->input('id');
        $author->name = $request->input('name');
        $author->country = $request->input('country');

        if($author->save()){
            return new AuthorResource($author);
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
        $author = Author::findOrFail($id);
        return new AuthorResource($author);
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
        $author = Author::findOrFail($id);
        if ($author->delete()) {
            return new AuthorResource($author);
        }
    }
}
