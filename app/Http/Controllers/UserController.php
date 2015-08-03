<?php namespace ImagesManager2\Http\Controllers;

use ImagesManager2\Http\Requests;
use ImagesManager2\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getEditProfile()
    {
    	return 'Showing edit profile form';
    }
    
    public function postEditProfile()
    {
    	return 'Chnaging the profile';
    }

}
