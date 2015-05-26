<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CommentsPostRequest;
use App\Http\Controllers\Controller;
use App\Comments;
use App\Blog;
use Auth;
use Redirect;

use Illuminate\Http\Request;

class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommentsPostRequest $CommentsPostRequest)
	{
		$comment = new Comments;
		$comment->commenter = Auth::user()->name;
		$comment->comment = $CommentsPostRequest->get('comment');
		$comment->blog_id = $CommentsPostRequest->get('blog_id');
		$comment->save();
		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		Comments::find($id)->delete();
		return redirect()->back();
	}

}
