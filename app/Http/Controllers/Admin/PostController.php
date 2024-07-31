<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Faker\Core\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();
       
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
 
         $post = Post::create($request->all());
           

        if($request->file('file'))
        {
            $url=$request->file('file')->store('public/posts');
            $post->image()->create([
                'url'=>$url
            ]);

        }



       if($request->tags){
        $post->tags()->attach($request  ->tags);

       }
       return redirect()->route('admin.posts.edit', $post);   
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        if (Gate::denies('author', $post)) {
            abort(403); // O muestra una vista de error 403
        }
       

        $categories = Category::all();
        $tags = Tag::all();

        $imageUrl = null;
        
       
        
        return view('admin.posts.edit',compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {

        if (Gate::denies('author', $post)) {
            abort(403); // O muestra una vista de error 403
        }
        $post->update($request->all());

        if($request->file('file')){
          
            $url=$request->file('file')->store('public/posts');


            if($post->image){
                Storage::delete($post->image->url);

                $post->image->update([
                    'url'=>$url
                ]);

            }else{
                $post->image()->create([
                    'url'=>$url
                ]);
            }
        }
            if($request->tags){
                $post->tags()->sync($request->tags);
            }



        return redirect()->route('admin.posts.edit',$post)->with('info', 'El post se actualizó con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Gate::denies('author', $post)) {
            abort(403); // O muestra una vista de error 403
        }
        $post->delete();
        return redirect()->route('admin.posts.index',$post)->with('info', 'El post se elimino con éxito');
    }
}





























