<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Mail;
use Session;
use DB;


class PagesController extends Controller{

	public function getIndex(){
		// show all posts
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		$posts = Post::paginate(4);
		// show all category
		$category = Category::all();
		// show 4 random posts
		$random = Post::orderBy(DB::raw('RAND()'))->get()->take(4);
		// show 4 most view posts
		$view = Post::orderBy('view_count','asc')->limit(4)->get();
		return view('pages/content')->withPosts($posts)->withCategory($category)->withRandom($random)->withView($view);
	}

	public function getPost($url) {
        // fetch from the DB based on url
        $post = Post::where('url', '=', $url)->first();
        $post->increment('view_count');
        // return the view and pass in the post object
        return view('pages.post')->withPost($post);
    }

}