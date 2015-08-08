<?php namespace ImagesManager2\Http\Requests;

use ImagesManager2\Http\Requests\Request;
use Auth;
use ImagesManager2\Album;
use ImagesManager2\Photo;

class DeletePhotoRequest extends Request {

	
	public function authorize()
	{
		
		$id = $this->get('id');
		$photo = Photo::find($id);
		$album = Auth::user()->albums()->find($photo->album_id);

		if($album)
		{
			return true;
		}
		return false;
	}

	
	public function rules()
	{
		return [
			'id'=>'required|exists:photos,id'
		];
	}

}
