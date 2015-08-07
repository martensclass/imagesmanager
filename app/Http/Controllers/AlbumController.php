<?php namespace ImagesManager2\Http\Controllers;

use ImagesManager2\Http\Requests;
use ImagesManager2\Http\Controllers\Controller;

use Illuminate\Http\Request;

use ImagesManager2\Album;
use Auth;

use ImagesManager2\Http\Requests\CreateAlbumRequest;
use ImagesManager2\Http\Requests\EditAlbumRequest;

class AlbumController extends Controller {

	 public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getIndex()
    {
    	$albums = Auth::user()->albums;
        return view('albums.show', ['albums' => $albums]);
    }

    public function getCreateAlbum()
    {
    	return view('albums.create-album');
    }

    public function postCreateAlbum(CreateAlbumRequest $request)
    {
    	$user = Auth::user();

        $title = $request -> get('title');
        $description = $request -> get('description');

        Album::create
        (
            [
                'title' => $title,
                'description' => $description,
                'user_id' => $user->id
            ]
        );

        return redirect('/validated/albums') -> with (['album_created' => 'Album succesfully created']);
    }

    public function getEditAlbum($id)
    {
        $album = Album::find($id);
    	return view('albums.edit-album',['album' => $album]);
    }

    public function postEditAlbum(EditAlbumRequest $request)
    {
    	$album = Album::find($request->get('id'));
         $album->title = $request->get('title');
        $album->description = $request->get('description');
        $album->save();

        return redirect('/validated/albums') -> with (['edited' => 'Album succesfully updated.']);

    }

    public function postDeleteAlbum()
    {
    	return 'Deleting album..';
    }

}
