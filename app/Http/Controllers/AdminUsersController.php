<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AdminUEditRequest;
use App\Http\Controllers\Controller;
use App\Users;
use Auth;
use Redirect;
use DB;
use Hash;

use Illuminate\Http\Request;

class AdminUsersController extends Controller {

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
		$user = Users::find($id);
    $data = array(
      'title' => "Beasty B | ".$user->name."'s Profile",
			'classes' => 'main-body admin-side admin-user-view',
      'user'	=> $user
      );
    return view('admin.users.show')->with('data', $data);
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
		if (Auth::user()->rank == 'admin') {
			$data = array(
				'title' => 'Beasty B | Edit '.$user->name,
				'classes' => 'main-body admin-side admin-user-edit',
				'user'	=> $user
				);
			return view('admin.users.edit')->with('data', $data);
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
	public function update($id, AdminUEditRequest $AdminUEditRequest)
	{
		if (Auth::user()->rank == 'admin' && !empty($AdminUEditRequest->get('new_password'))) {
	    $new_password = $AdminUEditRequest->get('new_password');
	    $con_passowrd = $AdminUEditRequest->get('password_confirmation');
	    DB::table('users')
	    ->where('id', $id)
	    ->update(array(
	        'password'	=> Hash::make($new_password),
	      ));
			return redirect('admin/user/'.$id)->with('message', 'The profile have been updated.');
		}
		if (Auth::user()->rank == 'admin') {
	    DB::table('users')
	    ->where('id', $id)
	    ->update(array(
	        'bio'			=> $AdminUEditRequest->get('bio'),
	        'city'		=> $AdminUEditRequest->get('city'),
	        'country'	=> $AdminUEditRequest->get('country'),
	      ));
			return redirect('admin/user/'.$id)->with('message', 'The profile have been updated.');
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
