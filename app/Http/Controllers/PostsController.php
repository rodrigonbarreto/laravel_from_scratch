<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except([
			'index',
			'show'
		]);
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$posts = Post::latest()->filter(\request(['month', 'year']))->get();

    	$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) asc')
        ->get()
        ->toArray();

    	return view('posts.index', compact('posts', 'archives'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    }

    public function store()
    {

    	// Validation
    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required'
    	]);

    	auth()->user()->publish(
    		new Post(request([
    			'title',
    			'body'
    		]))
    	);

    	return redirect('/');
    }
}
