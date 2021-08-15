<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class BlogController extends Controller
{
   public function index()
    {
		if(Auth::user()->is_admin == 1)
		{
		 $blogs = Blog::all();	
		}else{
		$blogs = Auth::user()->loggeduser;	
		}
        return view('index', compact('blogs'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
		$user = auth()->user();
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->published_at = date('Y-m-d h:i:s');
		
		$blog->created_by = $user->id;

        $blog->save();
        return redirect('/home')->with('success','Blog created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('edit', compact('blog'));
    }

    public function update(Blog $blog, Request $request)
    {
		
		
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->published_at = $request->published_at;

        $blog->save();
        return redirect('/home')->with('success','Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/home')->with('success','Blog deleted successfully!');
    }
}
