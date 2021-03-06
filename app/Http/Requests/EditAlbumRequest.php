<?php namespace ImagesManager2\Http\Requests;

use ImagesManager2\Http\Requests\Request;

use Auth;
use ImagesManager2\Album;

class EditAlbumRequest extends Request {

	public function authorize()
	{
		$user = Auth::user();

		$id = $this->get('id');

		$album = $user->albums()->find($id);

		if($album)
		{
			return true;
		}
		return false;
	}

	public function rules()
	{
		return [
			'id' => 'required|exists:albums,id',
			'title' => 'required',
			'description' => 'required'
		];
	}

	public function forbiddenResponse()
	{
		return $this->redirector->to('/');
	}

}
