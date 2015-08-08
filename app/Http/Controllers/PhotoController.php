<?php namespace ImagesManager2\Http\Controllers;

use ImagesManager2\Http\Requests;
use ImagesManager2\Http\Controllers\Controller;

use Illuminate\Http\Request;
use ImagesManager2\Http\Requests\ShowPhotoRequest;
use ImagesManager2\Http\Requests\CreatePhotoRequest;
use ImagesManager2\Http\Requests\EditPhotoRequest;
use ImagesManager2\Http\Requests\DeletePhotoRequest;

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

    public function getEditPhoto($id)
    {
    	$photo = Photo::find($id);
        return view('photos.edit-photo',['photo' => $photo]);
    }


    public function postEditPhoto(EditPhotoRequest $request)
    {
    	$photo = Photo::find($request->get('id'));
        $photo->title = $request->get('title');
        $photo->description = $request->get('description');

        if ($request->hasFile('image'))
        {
            $this->deleteImage($photo->path);
            $image = $request->file('image');

            $photo->path = $this->createImage($image);
        }

        $photo->save();
          return redirect("/validated/photos?id=$photo->album_id")->with(['edited' => 'Photo Updated']);
        
    }

    public function postDeletePhoto(DeletePhotoRequest $request)
    {
    	 $photo = Photo::find($request->get('id'));
         $album_id = $photo->album_id;
         $this->deleteImage($photo->path);
         $photo->delete();
         return redirect("/validated/photos?id=$album_id")->with(['deleted' => 'Photo Deleted']);
    }


    public function createImage($image)
    {
        $path = '/img/';
        $name = sha1(Carbon::now()).'.'.$image->guessExtension();
        $image->move(getcwd().$path, $name);

        return $path.$name;
    }

    public function deleteImage($oldpath)
    {
        $oldpath=getcwd().$oldpath;
        unlink(realpath($oldpath));
    }


}
