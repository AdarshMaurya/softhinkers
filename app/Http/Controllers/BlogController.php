<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{

	public function getIndex() {

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
		return view('blog.index')->with('posts',$posts);
	}

    public function getSingle($slug) {
    	// fetch from the DB based on slug
    	$post = Post::where('slug', '=', $slug)->first();
    	// return the view and pass in the post object
    	return view('blog.single')->with('post',$post);
    }
}
