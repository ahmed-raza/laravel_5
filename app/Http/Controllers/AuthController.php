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

class AuthController extends Controller {

	public function index(){
    $data = array(
      'title' => 'Beasty B | Login',
      'classes' => 'main-body user-auth user-login',
      );
    if (!Auth::user()) {
      return view('auth.index')->with('data', $data);
    }
    else{
      return Redirect::to('profile')->with('message', 'You are already logged in.');
    }
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
      'classes' => 'main-body user-auth user-registration',
      );
    return view('auth.register')->with('data', $data);
  }

  public function register(UserRegRequest $UserRegRequest){
    if (Users::count() == 0) {
      $user_rank = 'admin';
    }
    else{
      $user_rank = 'user';
    }
    Users::insert(array(
        'name' => $UserRegRequest->get('name'),
        'email' => $UserRegRequest->get('email'),
        'password' => Hash::make($UserRegRequest->get('password')),
        'rank' => $user_rank
      ));
    return redirect('user/login')->with('message','You have registered successfully.');
  }

  public function logout(){
    Auth::logout();
    return redirect('/');
  }

}
