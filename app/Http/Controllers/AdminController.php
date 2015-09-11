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
    if (Auth::user()->rank == 'admin') {
  		$query = Users::orderBy('name', 'ASC')->get();
      $data = array(
        'title' => "Beasty B | Site Users",
        'classes' => 'main-body admin-side admin-index',
        'users' => $query
        );
      return view('admin.users.index')->with('data', $data);
	  }
    else{
      return redirect('/')->withErrors('You are not authorized to access that page.');
    }
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
      'classes' => 'main-body admin-side total-posts',
      'posts' => $query
      );
    return view('admin.posts.index')->with('data', $data);
	}

	public function mail(){
    $data = array(
      'title' => "Beasty B | Send a Mail",
      'classes' => 'main-body admin-side mail-page',
      );
    return view('admin.mail.index')->with('data', $data);
	}

  public function mailSend(MailRequest $MailRequest){
    $mail = Mail::send('admin.mail.contact',
        array(
            'email' => $MailRequest->get('send-to'),
            'user_message' => $MailRequest->get('message')
        ), function($message){
        $message->from('ahmed@creativefaze.com');
        $message->to('ahmed.raza@square63.com', 'Admin')->subject('TODOParrot Feedback');
    });
    if ($mail) {
      return redirect('admin/mail')->with('message', 'Thanks for contacting us!');
    }
    else{
      return redirect('admin/mail')->withErrors('Something went wrong!');
    }
  }

}
