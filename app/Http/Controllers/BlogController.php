<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\BlogPostRequest;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Comments;
use Auth;
use Redirect;

use Illuminate\Http\Request;

class BlogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Blog::orderBy('created_at', 'DESC')->paginate(5);
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
			return redirect('user/login')->withErrors('You need to login first.');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(BlogPostRequest $BlogPostRequest)
	{
		$imageName = \Illuminate\Support\Str::slug($BlogPostRequest->get('title')).'-'. md5($BlogPostRequest->get('title')) .'.'.$BlogPostRequest->file('image')->getClientOriginalExtension();
		$post = new Blog;
		$post->author = Auth::user()->name;
		$post->title  = $BlogPostRequest->get('title');
		$post->img_name = $imageName;
		$post->body  = $BlogPostRequest->get('body');
		$post->description  = $BlogPostRequest->get('description');
		$post->keywords  = $BlogPostRequest->get('keywords');
		$post->slug = \Illuminate\Support\Str::slug($BlogPostRequest->get('title'));
		$post->save();
		$BlogPostRequest->file('image')->move(base_path() . '/public/img/', $imageName);
		return redirect('blog')->with('message', "Blog post ".$BlogPostRequest->get('title')." created.");
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
		$comments = Comments::where('blog_id', $query->id)->get();
		if (Auth::user()) {
			$username = Auth::user()->name;
		}
		else{
			$username = 'annonymous';
		}
		$data = array(
			'title' => 'Beasty B | '.$query->title,
			'post' => $query,
			'comments'=>$comments,
			'username' => $username,
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
		$query = Blog::find($id);
		if (Auth::user() && $query->author == Auth::user()->name ) {
			$data = array(
				'title' => 'Beasty B | Edit '.$query->title,
				'post' => $query,
				);
			return view('blog.edit')->with('data', $data);
		}
		else{
			return Redirect::back()->withErrors("You don't own '$query->title' post.");
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, BlogPostRequest $BlogPostRequest)
	{
		$input = $BlogPostRequest->all();
		Blog::where('id', $id)->update(array(
			'title'=>$input['title'],
			'description'=>$input['description'],
			'keywords'=>$input['keywords'],
			'body'=>$input['body'],
			'slug'=>\Illuminate\Support\Str::slug($input['title']),
			));
		$slug = \Illuminate\Support\Str::slug($input['title']);
		return Redirect::to('blog/'.$slug)->with('message', 'Post updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$image_name = Blog::find($id);
		$image_name = $image_name->img_name;
		Storage::delete(url().'/img/'.$image_name);
		Blog::find($id)->delete();

		return Redirect::route('blog.index')->with('message', url().'/img/'.$image_name);
	}

}
