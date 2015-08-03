<?php namespace ImagesManager2\Http\Controllers;

use ImagesManager2\Http\Requests;
use ImagesManager2\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AlbumController extends Controller {

	 public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getIndex()
    {
    	return 'This is Album homepage';
    }

    public function getCreateAlbum()
    {
    	return 'Page to make an album';
    }

    public function postCreateAlbum()
    {
    	return 'Creating album..';
    }

    public function getEditAlbum()
    {
    	return 'Page to edit an album';
    }

    public function postEditAlbum()
    {
    	return 'Editing album..';
    }

    public function postDeleteAlbum()
    {
    	return 'Deleting album..';
    }

}
