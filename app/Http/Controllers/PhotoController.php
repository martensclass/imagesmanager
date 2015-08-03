<?php namespace ImagesManager2\Http\Controllers;

use ImagesManager2\Http\Requests;
use ImagesManager2\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PhotoController extends Controller {

	public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getIndex()
    {
    	return 'This is Photo homepage';
    }

    public function getCreatePhoto()
    {
    	return 'Page to make an Photo';
    }

    public function postCreatePhoto()
    {
    	return 'Creating Photo..';
    }

    public function getEditPhoto()
    {
    	return 'Page to edit an Photo';
    }

    public function postEditPhoto()
    {
    	return 'Editing Photo..';
    }

    public function postDeletePhoto()
    {
    	return 'Deleting Photo..';
    }

}
