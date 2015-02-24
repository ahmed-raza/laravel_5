<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index(){
    $data = array(
      'title'=>'Beasty B'
      );
    return view('home.index')->with('data', $data);
  }

}
