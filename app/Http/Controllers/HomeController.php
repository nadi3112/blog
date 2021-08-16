<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogsComments;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	
	
	 public function allblogs()
    {
		 $blogs = Blog::all();
        return view('allblogs', compact('blogs'));
    }
	
	 public function adminHome()
    {
        return view('admin');
    }
	
	
	public function viewblog($id)
    {
		$blogs = Blog::find($id);
		$blog_comments =  BlogsComments::where('blog_id',$id)->get();
        return view('viewblog', compact('blogs','blog_comments'));
    }
	
	
	 public function storecomment(Request $request)
    {
		
		$user = auth()->user();
        $request->validate([
            'comment' => 'required'
            ]);
        $blog = new BlogsComments();
        $blog->comment = $request->comment;
        $blog->blog_id = $request->blog_id;
        $blog->published_at = date('Y-m-d h:i:s');
		
        $blog->save();
        //return redirect('/')->with('success','Comment added successfully!');
		   return back()->with('success', 'Comment added successfully!');
    }
	
}
