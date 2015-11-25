<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MailRequest;
use App\Http\Requests\HomeConfigRequest;
use App\Http\Requests\TestAjaxRequest;
use App\Http\Controllers\Controller;
use App\Users;
use App\Blog;
use App\HomePageSettings;
use Auth;
use Redirect;
use DB;
use Hash;
use Mail;
use Flash;
use Input;
use Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function users()
	{
    if (Auth::user() && Auth::user()->rank == 'admin') {
  		$query = Users::orderBy('name', 'ASC')->get();
      $data = array(
        'title' => "Machine Freak | Site Users",
        'classes' => 'main-body admin-side admin-index',
        'users' => $query
        );
      return view('admin.users.index')->with('data', $data);
	  }
    else{
      return redirect('/')->withErrors('You are not authorized to access that page.😴');
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
      'title' => "Machine Freak | Site Posts",
      'classes' => 'main-body admin-side total-posts',
      'posts' => $query
      );
    return view('admin.posts.index')->with('data', $data);
	}

  public function postsDelete($id){
    if (isset($id)) {
      return $id;
    }
  }

	public function mail(){
    if (Auth::user()) {
      if (Auth::user()->rank == 'admin') {
        $data = array(
          'title' => "Machine Freak | Send a Mail",
          'classes' => 'main-body admin-side mail-page',
          );
        return view('admin.mail.index')->with('data', $data);
      }
      else{
        return redirect('profile')->withErrors('You are not authorized to access this page.');
      }
    }
    else{
      Flash::overlay('You need to login first.', 'Uh oh!');
      return redirect('user/login');
    }
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

  public function siteConfig(){
    if (Auth::user()) {
      if (Auth::user()->rank == 'admin') {
        $data = array(
          'title' => "Machine Freak | Site Configuration",
          'classes' => 'main-body admin-side site-config',
          );
        return view('admin.site.index')->with('data', $data);
      }
      else {
        return redirect('profile')->withErrors('You are not authorized you access this page.');
      }
    }
    else {
      Flash::overlay('You need to login first.', 'Uh oh!');
      return redirect('user/login');
    }
  }

  public function siteHome(){
    if (Auth::user()) {
      if (Auth::user()->rank == 'admin') {
        $defualt_settings = HomePageSettings::find(1);
        $data = array(
          'title' => 'Machine Freak | Site Configuration',
          'settings'=>$defualt_settings,
          'classes' => 'main-body admin-side site-home',
          );
        return view('admin.site.home')->with('data', $data);
      }
      else{
        return redirect('profile')->withErrors('You are not allowed to access this page.');
      }
    }
    else{
      Flash::overlay('You need to login first.', 'Uh oh!');
      return redirect('user/login');
    }
  }

  public function homeStore(HomeConfigRequest $HomeConfigRequest){
    $title = $HomeConfigRequest->get('title');
    $body = $HomeConfigRequest->get('body');
    $homeSettings = HomePageSettings::find(1);
    $homeSettings->title = $title;
    $homeSettings->body = $body;
    $homeSettings->push();
    return redirect('admin/config')->with('message', 'Settings saved!');
  }

  public function test(){
    $data = array(
      'title' => 'Machine Freak | Site Configuration',
      'classes' => 'main-body admin-side site-home',
      );
    return view('admin.test.index')->with('data', $data);
  }

  public function testPost(TestAjaxRequest $TestAjaxRequest){
    if(Request::ajax()) {
      $hello = $TestAjaxRequest->get('hello');
      return $hello;
    }
  }

}
