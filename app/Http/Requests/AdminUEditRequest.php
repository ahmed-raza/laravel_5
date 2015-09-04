<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUEditRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id'			=> 'required',
			'city'		=> 'min:3',
			'country'	=> 'required|min:4',
			'bio'			=> 'required|min:10',
			'new_password' => 'min:5',
			'password_confirmation' => 'min:5|same:new_password',
		];
	}

}
