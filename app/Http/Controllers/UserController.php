<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRegRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
use App\Users;
use Auth;
use Redirect;
use Hash;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function index(){
    $data = array(
      'title' => 'Beasty B | Login',
      );
    return view('user.index')->with('data', $data);
  }

  public function login(UserLoginRequest $UserLoginRequest){
    $credentials = array(
      'email'=>$UserLoginRequest->get('email'),
      'password'=>$UserLoginRequest->get('password'),
      );
    if (Auth::attempt($credentials)) {
      return Redirect::to('profile');
    }
    else{
      return Redirect::to('user/login')->withErrors('Incorrect email/password.');
    }
  }

  public function regPage(){
    $data = array(
      'title' => 'Beasty B | Register',
      );
    return view('user.register')->with('data', $data);
  }

  public function register(UserRegRequest $UserRegRequest){
    Users::insert(array(
        'name' => $UserRegRequest->get('name'),
        'email' => $UserRegRequest->get('email'),
        'password' => Hash::make($UserRegRequest->get('password'))
      ));
    return redirect('user/login')->with('message','You have registered successfully.');
  }

  public function profile(){
    $data = array(
      'title' => 'Beasty B | Profile',
      );
    return view('user.profile')->with('data', $data);
  }

  public function logout(){
    Auth::logout();
    return redirect('/');
  }

}
