<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags =Tag::all();
        return view('admin.tags.index', compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'slug' => 'required|unique:tags',
            'color'=>'required'
        ]);

        $tags= Tag::create($request->all());
        return redirect()->route('admin.tags.edit', $tags );

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color'=>'required'
        ]);

        $tag->update($request->all());
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
