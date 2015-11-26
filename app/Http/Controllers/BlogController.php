<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\BlogPostRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Comments;
use Auth;
use Redirect;
use Flash;

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
			'title'=>'Machine Freak | Blog',
      'classes' => 'main-body blog-page blog-listing',
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
				'title'=>'Machine Freak | New Post',
      'classes' => 'main-body blog-page blog-new',
				);
			return view('blog.create')->with('data', $data);
		}
		else{
			Flash::overlay('You need to login first.', 'Uh oh!');
			return redirect('user/login');
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
		$files = $BlogPostRequest->file('files');
		$filesStore = "";
		foreach ($files as $key => $value) {
			$fileName =  $BlogPostRequest->get('title').'_('.$key.').'.$value->getClientOriginalExtension();
			$value->move(base_path() . '/public/img/', $fileName);
			$filesStore .= $fileName.",";
			$post->img_name = $filesStore;
		}
		$post->author = Auth::user()->name;
		$post->title  = $BlogPostRequest->get('title');
		$post->body  = $BlogPostRequest->get('body');
		$post->description  = $BlogPostRequest->get('description');
		$post->keywords  = $BlogPostRequest->get('keywords');
		$post->slug = \Illuminate\Support\Str::slug($BlogPostRequest->get('title'));
		$post->save();
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
			$rank = Auth::user()->rank;
		}
		else{
			$username = 'annonymous';
			$rank = null;
		}
		$files = explode(',', $query->img_name);
		$nbr = count($files);
		$data = array(
			'title' => 'Machine Freak | '.$query->title,
      'classes' => 'main-body blog-page blog-view',
			'post' => $query,
			'files' => $files,
			'comments'=>$comments,
			'username' => $username,
			'rank' => $rank
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
		if (Auth::user()) {
			$rank = Auth::user()->rank;
		}
		else{
			$rank = null;
		}
		$query = Blog::find($id);
		if (Auth::user()){
			if($query->author == Auth::user()->name || $rank == 'admin') {
				$data = array(
					'title' => 'Machine Freak | Edit '.$query->title,
					'classes' => 'main-body blog-page blog-edit',
					'post' => $query,
					);
				return view('blog.edit')->with('data', $data);
			}
			else {
				return redirect('blog')->withErrors('You don\'t own this post.');
			}
		}
		else{
			Flash::overlay('You need to login first.', 'Uh oh!');
			return redirect('user/login');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, BlogEditRequest $BlogEditRequest)
	{
		$input = $BlogEditRequest->all();
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
		Blog::find($id)->delete();

		return Redirect::route('blog.index')->with('message', 'Post deleted.');
	}

}
