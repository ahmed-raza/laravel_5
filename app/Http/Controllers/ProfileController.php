<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Controllers\Controller;
use App\Users;
use Auth;
use Redirect;
use DB;
use Hash;

use Illuminate\Http\Request;

class ProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Users::find(Auth::user()->id);
    $data = array(
      'title' => "Beasty B | ".$user->name."'s Profile",
      'classes' => 'main-body user-page user-profile',
      'user'	=> $user
      );
    return view('profile.index')->with('data', $data);
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
	public function store()
	{
		//
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

	public function showUser($id)
	{
		$user = Users::find($id);
    $data = array(
      'title' => "Beasty B | ".$user->name."'s Profile",
      'classes' => 'main-body user-page user-profile',
      'user'	=> $user
      );
    return view('profile.public_profile')->with('data', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = Users::find($id);
		if ($user->email == Auth::user()->email) {
			$data = array(
				'title' => 'Beasty B | Edit '.$user->name,
	      'classes' => 'main-body user-page user-profile-edit',
				'user'	=> $user
				);
			return view('profile.edit')->with('data', $data);
		}
		else{
			return redirect('profile');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ProfileEditRequest $ProfileEditRequest)
	{
		if (Hash::check($ProfileEditRequest->get('password'), Auth::user()->password) && !empty($ProfileEditRequest->get('new_password'))) {
	    $new_password = $ProfileEditRequest->get('new_password');
	    $con_passowrd = $ProfileEditRequest->get('password_confirmation');
	    DB::table('users')
	    ->where('id', $id)
	    ->update(array(
	        'password'=> Hash::make($new_password),
	        'bio'			=> $ProfileEditRequest->get('bio'),
	        'city'		=> $ProfileEditRequest->get('city'),
	        'country'	=> $ProfileEditRequest->get('country'),
	      ));
			return redirect('profile')->with('message', 'Your profile have been updated.');
		}
		if (Hash::check($ProfileEditRequest->get('password'), Auth::user()->password)) {
	    DB::table('users')
	    ->where('id', $id)
	    ->update(array(
	        'bio'			=> $ProfileEditRequest->get('bio'),
	        'city'		=> $ProfileEditRequest->get('city'),
	        'country'	=> $ProfileEditRequest->get('country'),
	      ));
			return redirect('profile')->with('message', 'Your profile have been updated.');
		}
		else{
			return Redirect::back()->withErrors('Current password is wrong.')->withInput();
		}
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
