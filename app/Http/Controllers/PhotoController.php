<?php namespace ImagesManager2\Http\Controllers;

use ImagesManager2\Http\Requests;
use ImagesManager2\Http\Controllers\Controller;

use Illuminate\Http\Request;
use ImagesManager2\Http\Requests\ShowPhotoRequest;
use ImagesManager2\Http\Requests\CreatePhotoRequest;

use ImagesManager2\Album;
use ImagesManager2\Photo;

use Carbon\Carbon;

class PhotoController extends Controller {

	public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getIndex(ShowPhotoRequest $request)
    {
    	$photos = Album::find($request->get('id'))->photos;
        $title = Album::find($request->get('id'))->title;
        return view('photos.show', ['photos' => $photos, 'id' => $request->get('id'), 'title' => $title]);
    }

    public function getCreatePhoto(Request $request)
    {
    	$id = $request->get('id');
        
        return view('photos.create-photo',['id' => $id]);
    }

    public function postCreatePhoto(CreatePhotoRequest $request)
    {
    	$image = $request->file('image');
        $id = $request->get('id');

        Photo::create
        (
            [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'path' => $this->createImage($image),
                'album_id' => $id
            ]
        );

        return redirect("/validated/photos?id=$id")->with(['created'=>'Photo added']);
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


    public function createImage($image)
    {
        $path = '/img/';
        $name = sha1(Carbon::now()).'.'.$image->guessExtension();
        $image->move(getcwd().$path, $name);

        return $path.$name;
    }

}
