<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Tag;
use App\Http\Resources\Tag as TagResource;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tags = Tag::all();
        // return TagResource::collection($tags);

        $data['tags'] = 
            DB::select('SELECT id, name_type, type_exp
                        FROM tags
                        ORDER BY id ASC');
        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    public function indexname()
    {
        // $tags = Tag::all();
        // return TagResource::collection($tags);

        $data['tags'] = 
            DB::select('SELECT id, name_type, type_exp
                        FROM tags
                        ORDER BY name_type ASC');
        return response()->json([
            "message" => "success",
            "data" => $data
        ]);
    }

    public function search(Request $request)
    {
        $tag_name = $request->input('search_tag');
        $data['tags'] = DB::select("
            SELECT id, name_type, type_exp
            FROM tags
            WHERE name_type like '%$tag_name%'
            ");
        $data['count'] = count($data['tags']);
        
        return response()->json([
            "message" => "success",
            "total" => $data['count'],
            "data" => $data['tags']
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
        $tag = $request->isMethod('put') ? Tag::findOrFail($request->id) : new Tag;

        $tag->id = $request->input('id');
        $tag->name_type = $request->input('name_type');

        if($tag->save()){
            return new TagResource($tag);
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
        $tag = Tag::findOrFail($id);
        return new TagResource($tag);
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
        $tag = Tag::findOrFail($id);
        if ($tag->delete()) {
            return new TagResource($tag);
        }
    }
}
