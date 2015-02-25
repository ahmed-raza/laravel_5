<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\BlogPostRequest;
use App\Http\Controllers\Controller;
use App\Blog;
use Auth;

use Illuminate\Http\Request;

class BlogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Blog::get();
		$data = array(
			'title'=>'Beast B | Blog',
			'blogs'=>$query
			);
		return view('blog.index')->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::user()) {
			$data = array(
				'title'=>'Beast B | New Post',
				);
			return view('blog.create')->with('data', $data);
		}
		else{
			return redirect('user/login')->withErrors('You need login first.');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(BlogPostRequest $BlogPostRequest)
	{
		$post = new Blog;
		$post->author = Auth::user()->name;
		$post->title  = $BlogPostRequest->get('title');
		$post->body  = $BlogPostRequest->get('body');
		$post->description  = $BlogPostRequest->get('description');
		$post->keywords  = $BlogPostRequest->get('keywords');
		$post->slug = \Illuminate\Support\Str::slug($BlogPostRequest->get('title'));
		$post->save();
		return redirect('blog')->with('message', "Blog post $BlogPostRequest->get('title') created.");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
	  $query = Blog::where('slug', $slug)->first();
	  $data = array(
	    'title' => 'Beasty B | '.$query->title,
	    'post' => $query,
	    'username' => Auth::user()->name,
	    );
	  return view('blog.show')->with('data', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
