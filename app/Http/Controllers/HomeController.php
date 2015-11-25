<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HomePageSettings;
use App\Blog;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index(){
    $page = HomePageSettings::find(1);
    $blogs = Blog::orderBy('created_at', 'DESC')->take(6)->get();
    $data = array(
      'title' => $page->title . ' | Home',
      'page' => $page,
      'blogs' => $blogs,
      'classes' => 'main-body home-page main-page',
      );
    return view('home.index')->with('data', $data);
  }

}
