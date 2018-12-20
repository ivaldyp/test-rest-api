<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        //
    }

    public function showAll()
    {
        $data['tags'] = 
            DB::select('SELECT id, name_type 
                        FROM tags');
        return view('pages.tags.table', $data);
    }

    public function showForm()
    {
        return view('pages.tags.form');
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
        $tag = new Tag;
        $tag->name_type = $request->name_type;
        if($tag->save()) {
            return redirect('tags/table')->with('message', 'Genre data added successfully');
        } else {
            return redirect('tags/form')->with('message', 'Failed to insert genre data');
        }
    }

    public function edit($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('pages.tags.modal')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $tag->name_type = $request->name_type;

        if($tag->save()) {
            return redirect('tags/table')->with('message', 'Genre data edited successfully');
        } else {
            return redirect('tags/form')->with('message', 'Failed to edit genre data');
        }
    }

    public function delete($id)
    {
        $tag = Tag::where('id', $id);
        $tag->delete();
        return redirect('tags/table');
    }
}
