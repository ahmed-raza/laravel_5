<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MailRequest;
use App\Http\Controllers\Controller;
use App\Users;
use App\Blog;
use Auth;
use Redirect;
use DB;
use Hash;
use Mail;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function users()
	{
		$query = Users::orderBy('name', 'ASC')->get();
    $data = array(
      'title' => "Beasty B | Site Users",
      'users' => $query
      );
    return view('admin.users.index')->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function posts()
	{
		$query = Blog::orderBy('created_at', 'DESC')->get();
    $data = array(
      'title' => "Beasty B | Site Posts",
      'posts' => $query
      );
    return view('admin.posts.index')->with('data', $data);
	}

	public function mail(){
    $data = array(
      'title' => "Beasty B | Send a Mail",
      );
    return view('admin.mail.index')->with('data', $data);
	}

  public function mailSend(MailRequest $MailRequest){
    Mail::send('admin.mail.contact',
        array(
            'email' => $MailRequest->get('send-to'),
            'user_message' => $MailRequest->get('message')
        ), function($message){
        $message->from('ahmed@creativefaze.com');
        $message->to('ahmed.raza@square63.com', 'Admin')->subject('TODOParrot Feedback');
    });

    return Redirect::route('/')->with('message', 'Thanks for contacting us!');
  }

}
